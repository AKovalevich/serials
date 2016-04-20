<?php

namespace App\Http\Controllers;

use Share\Episode;
use Share\Image;
use Share\Video;
use \Share\User;
use \Share\Asset;
use \Share\Tag;
use \Share\Genre;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Validator;

class DashboardController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('dashboard.pages.index');
    }


    public function assetList()
    {
        $assets = Asset::orderBy('id', 'desc')->get();
        return view('dashboard.pages.asset.asset_list', ['assets' => $assets]);
    }

    public function assetCreate(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'original_title' => 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/dashboard/assets/create')
                ->withErrors($validator)
                ->withInput();
        }
        $asset = new Asset();
        if (isset($input['title'])) {
            $asset->title = $input['title'];
        }
        if (isset($input['original_title'])) {
            $asset->original_title = $input['original_title'];
        }
        if (isset($input['plot'])) {
            $asset->plot = $input['plot'];
        }
        if (isset($input['start_date'])) {
            $asset->start_date = $input['start_date'];
        }
        if (isset($input['end_date'])) {
            $asset->end_date = $input['end_date'];
        }
        if (isset($input['body'])) {
            $asset->body = $input['body'];
        }
        if (isset($input['user_id'])) {
            $asset->user_id = $request->user()->id;
        }
        if (isset($input['tags'])) {
            $asset->tags()->attach($input['tags']);
        }
        if (isset($input['genres'])) {
            $asset->genre()->attach($input['genres']);
        }
        $asset->save();

        return redirect('/admin/dashboard/assets');
    }

    public function showAssetCreate() {
        $tags = Tag::orderBy('id', 'desc')->get();
        $genres = Genre::orderBy('id', 'desc')->get();

        $tags_options = [];
        foreach ($tags as $tag) {
            $tags_options[$tag->id] = $tag->name;
        }
        $genre_options = [];
        foreach ($genres as $genre) {
            $genre_options[$genre->id] = $genre->name;
        }

        return view('dashboard.pages.asset.asset_create', ['tags' => $tags_options, 'genres' => $genre_options]);
    }

    public function showAssetEdit(Request $request, $id) {
        $asset = Asset::find($id);
        $current_tags = $asset->tags()->get();
        $tags = Tag::all();
        $selected_tags = [];
        $tags_list = [];
        $current_genres = $asset->genre()->get();
        $genres = Genre::all();
        $selected_genres = [];
        $genre_list = [];

        foreach ($current_tags as $current_tag) {
            $selected_tags[$current_tag->id] = $current_tag->id;
        }

        foreach ($tags as $tag) {
            $tags_list[$tag->id] = $tag->name;
        }

        foreach ($current_genres as $current_genre) {
            $selected_genres[$current_genre->id] = $current_genre->id;
        }

        foreach ($genres as $genre) {
            $genre_list[$genre->id] = $genre->name;
        }

        return view('dashboard.pages.asset.asset_edit', [
            'asset' => $asset,
            'tags_list' => $tags_list,
            'selected_tags' => $selected_tags,
            'genres_list' => $genre_list,
            'selected_genres' => $selected_genres
          ]
        );
    }

    public function assetEdit(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
          'title' => 'required|max:255',
          'original_title' => 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/dashboard/assets/create')
              ->withErrors($validator)
              ->withInput();
        }

        $asset = Asset::find($id);
        if (isset($input['title'])) {
            $asset->title = $input['title'];
        }
        if (isset($input['original_title'])) {
            $asset->original_title = $input['original_title'];
        }
        if (isset($input['plot'])) {
            $asset->plot = $input['plot'];
        }
        if (isset($input['start_date'])) {
            $asset->start_date = $input['start_date'];
        }
        if (isset($input['end_date'])) {
            $asset->end_date = $input['end_date'];
        }
        if (isset($input['body'])) {
            $asset->body = $input['body'];
        }
        if (isset($input['user_id'])) {
            $asset->user_id = $request->user()->id;
        }
        if (isset($input['tags'])) {
            $asset->tags()->detach();
            $asset->tags()->attach($input['tags']);
        }
        if (isset($input['genres'])) {
            $asset->genre()->detach();
            $asset->genre()->attach($input['genres']);
        }

        $asset->save();
        return redirect('/admin/dashboard/assets');
    }


    public function userList()
    {
        $users = User::orderBy('name', 'desc')->get();
        return view('dashboard.pages.user.user_list', ['users' => $users]);
    }

    public function showUserEdit($id)
    {
        $user = User::find($id);
        return view('dashboard.pages.user.user_edit', ['user' => $user]);
    }

    public function userEdit(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/dashboard/users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        if (isset($input['name'])) {
            $user->name = $input['name'];
        }
        if (isset($input['email'])) {
            $user->email = $input['email'];
        }
        if (isset($input['password'])) {
            $user->password = bcrypt($input['password']);
        }
        $user->save();

        return view('dashboard.pages.user.user_edit', ['user' => $user, 'message' => 'User has been save']);
    }

    public function showUserCreate()
    {
        return view('dashboard.pages.user.user_create');
    }

    public function userCreate(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/dashboard/users/create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        if (isset($input['name'])) {
            $user->name = $input['name'];
        }
        if (isset($input['email'])) {
            $user->email = $input['email'];
        }
        if (isset($input['password'])) {
            $user->password = bcrypt($input['password']);
        }
        $user->save();

        return redirect('/admin/dashboard/users');
    }


    public function tagsList()
    {
        $tags = Tag::orderBy('id', 'desc')->get();
        return view('dashboard.pages.tag.tag_list', ['tags' => $tags]);
    }

    public function tagCreate(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/dashboard/tags/create')
                ->withErrors($validator)
                ->withInput();
        }

        $tag = new Tag();
        if (isset($input['name'])) {
            $tag->name = $input['name'];
        }

        $tag->save();

        return redirect('/admin/dashboard/tags');
    }

    public function showTagCreate()
    {
        return view('dashboard.pages.tag.tag_create');
    }

    public function showTagEdit(Request $request, $id)
    {
        $tag = Tag::find($id);
        return view('dashboard.pages.tag.tag_edit', ['tag' => $tag]);
    }

    public function tagEdit(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/dashboard/tags/create')
                ->withErrors($validator)
                ->withInput();
        }

        $tag = Tag::find($id);
        if (isset($input['name'])) {
            $tag->name = $input['name'];
        }

        $tag->save();
        return redirect('/admin/dashboard/tags');
    }


    public function genreList(Request $request)
    {
        $genres = Genre::orderBy('id', 'desc')->get();
        return view('dashboard.pages.genre.genre_list', ['genres' => $genres]);
    }

    public function showGenreCreate()
    {
        return view('dashboard.pages.genre.genre_create');
    }

    public function genreCreate(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/dashboard/genres/create')
                ->withErrors($validator)
                ->withInput();
        }

        $genre = new Genre();
        if (isset($input['name'])) {
            $genre->name = $input['name'];
        }

        $genre->save();

        return redirect('/admin/dashboard/genres');
    }

    public function genreEdit(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/dashboard/genres/create')
                ->withErrors($validator)
                ->withInput();
        }

        $genre = Genre::find($id);
        if (isset($input['name'])) {
            $genre->name = $input['name'];
        }

        $genre->save();
        return redirect('/admin/dashboard/genres');
    }

    public function showGenreEdit(Request $request, $id)
    {
        $genre = Genre::find($id);
        return view('dashboard.pages.genre.genre_edit', ['genre' => $genre]);
    }


    public function imageList() {
        $images = Image::orderBy('id', 'desc')->get();
        return view('dashboard.pages.image.image_list', ['images' => $images]);
    }
    public function showImageCreate() {
        return view('dashboard.pages.image.image_create');
    }
    public function showImageEdit(Request $request, $id) {
        $image = Image::find($id);
        return view('dashboard.pages.image.image_edit', ['image' => $image]);
    }
    public function imageEdit(Request $request, $id) {

    }
    public function imageCreate(Request $request) {

    }

    public function videoList() {
        $videos = Video::orderBy('id', 'desc')->get();
        return view('dashboard.pages.video.video_list', ['videos' => $videos]);
    }
    public function showVideoCreate() {
        return view('dashboard.pages.video.video_create');
    }
    public function showVideoEdit(Request $request, $id) {
        $video = Video::find($id);
        return view('dashboard.pages.video.video_edit', ['video' => $video]);
    }
    public function videoEdit(Request $request, $id) {

    }
    public function videoCreate(Request $request, $id) {

    }

    public function episodeList(Request $request) {
        $episodes = Episode::orderBy('id', 'desc')->get();
        return view('dashboard.pages.episode.episode_list', ['episodes' => $episodes]);
    }
    public function showEpisodeCreate() {
        return view('dashboard.pages.episode.episode_create');
    }
    public function showEpisodeEdit(Request $request, $id) {
        $episode = Episode::find($id);
        return view('dashboard.pages.episode.episode_edit', ['episode' => $episode]);
    }
    public function episodeEdit(Request $request, $id) {

    }
    public function episodeCreate(Request $request, $id) {

    }

}
