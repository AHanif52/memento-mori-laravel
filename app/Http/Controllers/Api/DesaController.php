<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\DesaRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\DesaResource;
use Laravolt\Indonesia\Models\Village;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json([
                'success' => true,
                'data' => Village::paginate(20)
                //u can use this too
                //'data' => new DesaCollection($Village::paginate(20))
            ], 200);
        } catch(Exception $e){
            Log::error('Error fetching villages: ' . $e->getMessage());

            return response()->json([
               'success' => false,
               'message' => 'An error occurred while fetching the data. Please try again later.'
            ], 500);
        };
        // $villages = Village::all();
        // return response()->json($villages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesaRequest $request)
    {
        try{
            $village = new DesaResource(Village::create($request->all()));
            
            return response()->json([
                'success' => true,
                'data' => $village
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422); 
        } catch(Exception $e){
            Log::error('Error inserting villages: ' . $e->getMessage());
            
            return response()->json([
               'success' => false,
               'message' => 'An error occurred while fetching the data. Please try again later.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $village = Village::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => new DesaResource($village)
            ], 200);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Village not found'
            ], 404);
        } catch(Exception $e){
            Log::error('Error fetching villages: ' . $e->getMessage());
            
            return response()->json([
               'success' => false,
               'message' => 'An error occurred while fetching the data. Please try again later.'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesaRequest $request, $id)
    {
        try{
            $village = Village::findOrFail($id);
            $village->update($request->validated());
            
            return response()->json([
                'success' => true,
                'data' => new DesaResource($village)
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Village not found'
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422); 
        } catch(Exception $e){
            Log::error('Error updating villages: ' . $e->getMessage());
            
            return response()->json([
               'success' => false,
               'message' => 'An error occurred while fetching the data. Please try again later.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $village = Village::findOrFail($id);
            $village->delete();
            
            return response()->json([
                'success' => true,
                'data' => 'Village deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Village not found for deletion'
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422); 
        } catch(Exception $e){
            Log::error('Error deleting villages: ' . $e->getMessage());
            
            return response()->json([
               'success' => false,
               'message' => 'An error occurred while fetching the data. Please try again later.'
            ], 500);
        }
    }
}
