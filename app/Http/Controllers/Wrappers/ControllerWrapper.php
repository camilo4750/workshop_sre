<?php

namespace App\Http\Controllers\Wrappers;


use App\Exceptions\AlertException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class ControllerWrapper
{

    public static function execWithJsonResponse($callback)
    {
        try{
            DB::beginTransaction();
            $response= $callback();
            DB::commit();
        }catch (AlertException  $exception){
            DB::rollBack();
            $response= response()->json(['errors'=> [
                '0'=> [$exception->getMessage()]
            ]],  422);
        }catch (\Exception $exception){
            DB::rollBack();
            report($exception);
            $response= response()->json(['errors'=> [
                '0'=> [$exception->getMessage()]
            ]],  422);
        }
        return $response;
    }

    public static function execWithJsonSuccessResponse($callback, $fallback= null)
    {
        try{
            DB::beginTransaction();
            $response= $callback();
            $response= array_merge([
                'success'=> true,
                'message'=> ''
            ], $response);

            DB::commit();
        }catch (AlertException $exception){
            DB::rollBack();

            if(!is_null($fallback)) $response= $fallback($exception);
            else $response=[];

            $response= response()->json(array_merge([
                'success'=> false,
                'message'=> $exception->getMessage()
            ], $response), 200);
        }catch (\Exception $exception){
            $errors = [];
            $messagesValidation = $exception->validator->messages();

            foreach ($messagesValidation->messages() as $key => $messages) {
                foreach ($messages as $message) {
                    $errors[$key] = $message;
                }
            }
            DB::rollBack();
            report($exception);

            if(!is_null($fallback)) $response= $fallback($exception);
            else $response=[];

            $response= response()->json(array_merge([
                'success'=> false,
                'message'=> $exception->getMessage(),
                'errors' => $errors,
            ], $response), 200);
        }catch (\Throwable $exception){
            DB::rollBack();

            if(!is_null($fallback)) $response= $fallback($exception);
            else $response=[];

            $response= response()->json(array_merge([
                'success'=> false,
                'message'=> $exception->getMessage()
            ], $response), 200);
        }catch (FatalThrowableError $exception){
            DB::rollBack();

            if(!is_null($fallback)) $response= $fallback($exception);
            else $response=[];

            $response= response()->json(array_merge([
                'success'=> false,
                'message'=> $exception->getMessage()
            ], $response), 200);
        }catch (\ErrorException $exception){
            DB::rollBack();

            if(!is_null($fallback)) $response= $fallback($exception);
            else $response=[];

            $response= response()->json(array_merge([
                'success'=> false,
                'message'=> $exception->getMessage()
            ], $response), 200);
        }catch (FatalErrorException $exception){
            DB::rollBack();

            if(!is_null($fallback)) $response= $fallback($exception);
            else $response=[];

            $response= response()->json(array_merge([
                'success'=> false,
                'message'=> $exception->getMessage()
            ], $response), 200);
        }
        return $response;
    }

    public static function execWithHttpResponse($callback)
    {
        try{
            DB::beginTransaction();
            $response= $callback();
            DB::commit();
        }catch (AlertException $exception){
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }catch (\Exception $exception){
            DB::rollBack();
            report($exception);
            return back()->withErrors($exception->getMessage());
        }
        return $response;
    }

    public static function execWithRawResponse($callback, $fallback)
    {
        try{
            DB::beginTransaction();
            $response= $callback();
            DB::commit();
        }catch (AlertException $exception){
            DB::rollBack();
            $response= $fallback($exception);
        }catch (\Exception $exception){
            DB::rollBack();
            report($exception);
            $response= $fallback($exception);
        }catch (\Throwable $exception){
            DB::rollBack();
            report($exception);
            $response= $fallback($exception);
        }catch (FatalThrowableError $exception){
            DB::rollBack();
            report($exception);
            $response= $fallback($exception);
        }catch (\ErrorException $exception){
            DB::rollBack();
            report($exception);
            $response= $fallback($exception);
        }catch (FatalErrorException $exception){
            DB::rollBack();
            report($exception);
            $response= $fallback($exception);
        }
        return $response;
    }
}
