<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Comments;
    use App\Models\Reply;
    use App\Models\Reaction;
    use App\Models\Reactions;

    class CommentsController extends Controller {

         public function comments(Request $request){

             $comments = Comments::all();
             return response()->json([$comments]);//view('comments', compact($comments));

         }

         public function addComment(Request $request){
             $comment = Comments::create([
                 'comment' => $request->get('comment'),
                 'postId' => $request->get('postId'),
                 //'timestamp' => date("Y-m-d H:i:s"), 
                 'verification' => true,
                 'userId' => $request->get('userId')
             ]);

             $comment = Comments::where('postId', $request->get('postId'))->first();

             return response()->json([$comment]);
         }

         public function removeComment(Request $request){
                  $autUser = false;
                  $id = $request->get('id');

                  $comment = Comments::where('id', $id)->first();
                  $autUser = $request->get('userId') == $comment->get('userId');

             if(autUser){
                  Comments::destroy($id);
                  $reply = Reply::where('commentId', $id)->delete();
             }
            
         }

         public function addReply(Request $request){
             $reply = Reply::create([
                    'reply' => $request->get('reply'),
                    'commentId' => $request->get('commentId'),
                    //'timestamp' => date("Y-m-d H:i:s"),
                    'verification' => true,
                    'userId' => $request->get('userId')
             ]);

         }

         public function removeReply(Request $request){
                    $autUser = false;

                    $checkReply = Reply::where('id', $id)->first();
                    $autUser = $request->get('userId') == $checkReply->get('userId');

                    if(autUser){
                        $reply = Reply::destroy($id);

                    }
         }

         public function  addReaction(Request $request){
                    $reaction = Reaction::create([
                            'name'  =>  $request->get('name'),
                            'image'  =>  $request->get('image')  
                    ]);

                    return 'added';
         }

         public function removeReaction(Request $request){
                    $autUser = false;

                    $checkReaction = Reaction::destroy()->where('userId', $request->get('userId'))->where('commentId', $request->get('commentId'))->first();
         }
    }
