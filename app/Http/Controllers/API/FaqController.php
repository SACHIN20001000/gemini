<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\ChowhubFaq;

use App\Models\User;

use App\Http\Resources\Faqs\FaqResource;
use App\Http\Resources\Faqs\ChowhubFaqResource;

use App\Http\Requests\API\FaqRequest;
class FaqController extends Controller
{
      /**
     * @OA\Get(
     *      path="/faqs/{product_id}",
     *      operationId="faqs",
     *      tags={"Faqs"},
     *
     *     summary="Faqs",
     *     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="3",
     *         required=true,
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Pages",
     *         @OA\JsonContent(ref="#/components/schemas/FaqResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index($id)
    {
        $faqs = Faq::with('user','product')->where('product_id',$id)->orderBy('id', 'asc')->get();

        return  FaqResource::collection($faqs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
  /**
     * @OA\Post(
     *      path="/faq/store",
     *      operationId="faqs store",
     *      tags={"Faqs"},
     *
     *     summary="Faqs store",
     *  *      *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FaqRequest")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Pages",
     *         @OA\JsonContent(ref="#/components/schemas/FaqResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FaqRequest $request)
    {
        $user=User::where(['name'=>$request->name,'email'=>$request->email])->first();

            if(!empty($user)){

                $inputs['user_id']=$user->id;
                $inputs['title']=$request->question;
                $inputs['product_id']=$request->product_id;
                $inputs['published']=0;
                Faq::create($inputs);

            }else{
               $guest['name']=$request->name;
               $guest['email']=$request->email;
               $guest['password'] = bcrypt(12345678);
               $guest_id= user::create($guest);
               $inputs['user_id']=$guest_id->id;
               $inputs['title']=$request->question;
               $inputs['product_id']=$request->product_id;
               $inputs['published']=0;
               Faq::create($inputs);

            }

            return response()->json([
                'success' => true,'message' => 'Faq created successfull'
            ]);
    }

       /**
     * @OA\Get(
     *      path="/chowhub/faq/{product_id}",
     *      operationId="chowhubFaq",
     *      tags={"Faqs"},
     *
     *     summary="chowhubFaq",
     *     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="3",
     *         required=true,
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Pages",
     *         @OA\JsonContent(ref="#/components/schemas/FaqResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function chouhubIndex($id)
    {
        $faqs = ChowhubFaq::with('user','product')->where('product_id',$id)->orderBy('id', 'asc')->get();

        return  ChowhubFaqResource::collection($faqs);

    }


  /**
     * @OA\Post(
     *      path="/chowhub/faq/store",
     *      operationId="chowhubFaq store",
     *      tags={"Faqs"},
     *
     *     summary="chowhubFaq store",
     *  *      *    @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FaqRequest")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Pages",
     *         @OA\JsonContent(ref="#/components/schemas/FaqResponse")
     *     ),
     *    @OA\Response(
     *      response=400,ref="#/components/schemas/BadRequest"
     *    ),
     *    @OA\Response(
     *      response=404,ref="#/components/schemas/Notfound"
     *    ),
     *    @OA\Response(
     *      response=500,ref="#/components/schemas/Forbidden"
     *    )
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExampleStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function chouhubStore(FaqRequest $request)
    {
        $user=User::where(['name'=>$request->name,'email'=>$request->email])->first();

            if(!empty($user)){

                $inputs['user_id']=$user->id;
                $inputs['title']=$request->question;
                $inputs['product_id']=$request->product_id;
                $inputs['published']=0;
                ChowhubFaq::create($inputs);

            }else{
               $guest['name']=$request->name;
               $guest['email']=$request->email;
               $guest['password'] = bcrypt(12345678);
               $guest_id= user::create($guest);
               $inputs['user_id']=$guest_id->id;
               $inputs['title']=$request->question;
               $inputs['product_id']=$request->product_id;
               $inputs['published']=0;
               ChowhubFaq::create($inputs);

            }

            return response()->json([
                'success' => true,'message' => 'Faq created successfull'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
