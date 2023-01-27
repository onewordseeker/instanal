<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Search;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class MainController extends Controller
{

    public function index(Request $request)
    {
        $userData = getInstagramUser(['username' => $request->get('username')]);
        if(!$userData){
            return redirect('index')->with('error', 'User Does Not Exists');
        }
        $calculatedData = $this->account_details($userData);
        return view('info', compact('calculatedData'));
    }

    public function get_register(){
        if(!Auth::check())
            return view('register');
        else
            return redirect('/');
    }
    public function post_register(Request $req){
        if(!$req->email) {
            session()->flash('error', 'Email is reqiured');
            return redirect('/register');
        }
        if(!$req->password) {
            session()->flash('error', 'Password is reqiured');
            return redirect('/register');
        }
        if(!$req->name) {
            session()->flash('error', 'Name is reqiured');
            return redirect('/register');
        }
       $data =  $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $data['password'] = Hash::make($req->password);
        $user = User::create($data);
        $user->save();

        return redirect()->to('/login');

    }
    public function login_get(){
        if(!Auth::check())
            return view('login');
        else
            return redirect('/');
    }


    public function logout() {
        if(Auth::check()){
            Auth::logout();
            return redirect('login');
        } else
            return redirect('/');
    }

    public function login_post(Request $req){
        $user = User::where(['email' => request('email')])->first();
         $flag = false;
        if(!request('email')) {
            return redirect('login')->with('error', 'Invalid Email');
        }
        if(!request('password')) {
            return redirect('login')->with('error', 'Invalid Password');
         }
        // if($user->verification_code) {
        //     $flag = true;
        // }
        if(!$flag)
        {
            if(auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
                return redirect('/');
            } else {
                return redirect('login')->with('error', 'Invalid Email or Password');
            }
        } else {
            return redirect('login')->with('error', 'Email is not Verified');
        }
    }

    public function account_details($response)
    {
        $search_record = [];
        $search_record['user_id'] = Auth::check() ? Auth::user()->id : null;
        $search_record['profile_id'] = $response->data->user->id;
        $search_record['profile_username'] = $response->data->user->username;
        Search::create($search_record);

        $profile = Profile::find($response->data->user->id);
        if(!$profile) {
            $profile = (array) $response->data->user;
            $profile['followers'] = $response->data->user->edge_followed_by->count;
            $profile['followees'] = $response->data->user->edge_follow->count;
            $profile['is_business'] = $response->data->user->is_business_account ? true : false;
            $profile['igtv_count'] = $response->data->user->edge_owner_to_timeline_media->count;
            $profile['post_count'] = $response->data->user->edge_owner_to_timeline_media->count;
            Profile::create($profile);
        } else {
            $profile['followers'] = $response->data->user->edge_followed_by->count;
            $profile['followees'] = $response->data->user->edge_follow->count;
            $profile['is_business'] = $response->data->user->is_business_account ? true : false;
            $profile['igtv_count'] = $response->data->user->edge_owner_to_timeline_media->count;
            $profile['post_count'] = $response->data->user->edge_owner_to_timeline_media->count;
            $profile->save();
        }

        $user['profile'] = $response->data->user;
        $user['posts'] = $response->data->user->edge_owner_to_timeline_media;
        $counter = 0; // $response->data->user->count;
        $likes = 0;
        $comments = 0;
        $video_views = 0;
        $tags = 0;
        $mentions = 0; $hashtags = [];
        $user['er_rate'] = 0;
        $er_rate = 0;
        $paid = 0;
        $paid_er_rate = 0;
        $raw = 0;
        foreach ($user['posts']->edges as $post){
            $post = $post->node;
            // $_post_data = getPost($post->shortcode)->graphql->shortcode_media;
            $counter += 1;
            $er_rate += (($post->edge_liked_by->count + $post->edge_media_to_comment->count)/$user['profile']->edge_followed_by->count) * 100;
            if(count($post->edge_media_to_caption->edges)) {
                if(count(explode('#', $post->edge_media_to_caption->edges[0]->node->text))) {
                    $hasht = explode('#', $post->edge_media_to_caption->edges[0]->node->text);
                    array_push($hashtags, $hasht);
                }
            }
            $likes += $post->edge_liked_by->count;
            $comments += $post->edge_media_to_comment->count;
            $video_views += isset($post->video_view_count) ? $post->video_view_count : 0;
            $tags += count($post->edge_media_to_tagged_user->edges);
            // if($_post_data->is_paid_partnership) {
            //     $paid++;
            //     $paid_er_rate += ((($post->edge_liked_by->count + $post->edge_media_to_comment->count)/$user['profile']->edge_followed_by->count) * 100);
            // }
        }
        $hashtags_frequency = [];
        $hashtag_graph = '';
        $total_tags = 0;
        $total_posts = 0;
        if($hashtags){
            foreach ($hashtags as $hashtag){
                foreach($hashtag as $hash){
                    $total_tags++;
                    if(array_key_exists($hash, $hashtags_frequency)){
                        $hashtags_frequency[$hash] += 1;
                    }
                    else{
                        $hashtags_frequency[$hash] = 1;
                    }
                    $hashtag_graph .= $hash . ' ';
                }
            }
        }
        arsort($hashtags_frequency);
        $user['hashtag_graph'] = $hashtag_graph;
        $user['hashtags'] = array_slice($hashtags_frequency, 0, 6);
        $user['average_tags'] = count($user['posts']->edges) != 0 ?  ($total_tags) / count($user['posts']->edges) : $user['average_tags'] = 0;
        $user['average_likes_total'] =count($user['posts']->edges) != 0 ? $likes / count($user['posts']->edges) : $user['average_likes_total'] = 0;
        $user['average_comments_total'] =  count($user['posts']->edges) != 0 ? $comments / count($user['posts']->edges) : $user['average_comments_total'] = 0;
        $user['average_views_total'] =  count($user['posts']->edges) != 0 ? $video_views / count($user['posts']->edges) : $user['average_views_total'] = 0;
        $user['er_rate'] =$counter!=0 ? $er_rate / $counter :  $user['er_rate'] = 0;
        $user['paid_er'] = $paid ? $paid_er_rate / $paid : 0;
        $user['raw_er'] = $user['er_rate'] - $paid_er_rate;
        $user['likes_vs_comments'] = $likes / ($comments != 0 ? $comments : 1);
        $user['view_rate'] = $video_views / $user['profile']->edge_followed_by->count;

        $user['followers'] = $response->data->user->edge_followed_by->count;
        $user['followees'] = $response->data->user->edge_follow->count;
        $user['is_business'] = $response->data->user->is_business_account ? true : false;
        $user['igtv_count'] = $response->data->user->edge_owner_to_timeline_media->count;
        $user['post_count'] = $response->data->user->edge_owner_to_timeline_media->count;

        $start_date = date('d-m-Y', strtotime($user['posts']->edges[0]->node->taken_at_timestamp));
        $end_date = date('d-m-Y', strtotime($user['posts']->edges[count($user['posts']->edges) != 0 ? count($user['posts']->edges) - 1 : 1]->node->taken_at_timestamp));
        $interval = strtotime($start_date) - strtotime($end_date);
        $days = floor($interval / 86400);
        $user['post_freq'] =count($user['posts']->edges) != 0 ? $days / count($user['posts']->edges) : $user['post_freq'] = 0;


        return $user;
        // dd($response->posts->posts[0]->comments[0]->text);
    }

    public function get_update_profile(){
        if(Auth::check()){
            $data['user'] = User::where('id', Auth::user()->id)->first();
            return view('profile', $data);
        }
        else{
            return back()->with('error','Please Login to Continue');
        }
    }

    public function post_update_profile(Request $req){
        $user = User::where('id', Auth::user()->id)->first();
        $req->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
        ]);
            $user->password = Hash::make($req->new_password);
            $user->update();
            return redirect('/')->with('success','Updation Successfull');
        }


    public function search_history(Request $request){
        $response = getInstagramUserFollowerHistory(['id' => $request->get('user_id'), 'username'=> $request->get('username')]);
        return $response;

        // $user = Auth::user()->id;
        // $data['search'] = Search::where('user_id', $user)->get();
        // if(count($data['search']) != 0){
        //     return view('search-history', $data);
        // }
        // else{
        //     $data['search'] = 'No data';
        //     return view('search-history', $data);
        // }
    }

    public function update_profiles($data){
        $profile = new Profile();
        $response = getInstagramUser($data);
        $profile = (array) $response->data->user;
            $profile['followers'] = $response->data->user->edge_followed_by->count;
            $profile['followees'] = $response->data->user->edge_follow->count;
            $profile['is_business'] = $response->data->user->is_business_account ? true : false;
            $profile['igtv_count'] = $response->data->user->edge_owner_to_timeline_media->count;
            $profile['post_count'] = $response->data->user->edge_owner_to_timeline_media->count;
            Profile::create($profile);
            return 1;
    }

    public function lists() {
        return view('lists');
    }

    public function create_list(Request $req){
        if(Auth::check()){
            $list = new Lists();
            $list = $req->all();
            $list['user_id'] = Auth::user()->id;
            Lists::create($list);
        }
        else{
            return view('lists')->with('error', 'Please Login To Create A list');
        }
    }
}
