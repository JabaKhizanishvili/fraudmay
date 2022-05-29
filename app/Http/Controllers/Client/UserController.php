<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\UploadDocumentRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * @param string $locale
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(string $locale, Request $request)
    {
        //        $allert = $request->session()->get('success', null);
        //        if($request->session()->get('fail', null)){
        //            $allert=$request->session()->get('fail', null);
        //        }

        $user = User::where("id", Auth::id())->with([
            "file",
            "profile"
        ])->firstOrFail();
        //        dd($user);
        return \Inertia\Inertia::render("Account/Account", ["account" => $user]);
    }

    public function changePasswordView(string $locale, Request $request)
    {
        return view('client.pages.dashboard.change-password');
    }

    public function changePassword(PasswordChangeRequest $request)
    {

        $user = User::find(Auth()->user()->id);

        $user->password = Hash::make($request['password']);

        if ($user->save()) {
            return redirect()->back()->with('success', __('client.password_changed'));
        }
        return redirect()->back()->with('fail', __('client.password_was_not_changed'));
    }


    public function uploadUserDoc(Request $request)
    {
        if ($request->hasFile('photo')) {
            $imagename = date('Ymhs') . $request->file('photo')->getClientOriginalName();
            $destination = base_path() . '/storage/app/public/' . 'User' . '/' . auth()->user()->id;
            $request->file('photo')->move($destination, $imagename);
            auth()->user()->files()->create([
                'title' => $imagename,
                'path' => 'storage/' . 'User' . '/' . auth()->user()->id,
                'format' => $request->file('photo')->getClientOriginalExtension(),
                'type' => File::FILE_DEFAULT
            ]);
        }

        return redirect()->back()->with('successSaveDoc', __('client.document_success_upload'));
    }

    public function settings()
    {
        return view('client.pages.settings.index');
    }

    public function saveAccount(AccountRequest $request)
    {

        $user = User::where(['id' => auth()->user()->id])->first();
        $user->profile->update([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'country' => $request['country'],
            'zip_code' => $request['zip_code'],
        ]);

        if ($request->hasFile('photo')) {
            $imagename = date('Ymhs') . $request->file('photo')->getClientOriginalName();
            $destination = base_path() . '/storage/app/public/' . 'User' . '/' . auth()->user()->id;
            $request->file('photo')->move($destination, $imagename);
            auth()->user()->files()->create([
                'title' => $imagename,
                'path' => 'storage/' . 'User' . '/' . auth()->user()->id,
                'format' => $request->file('photo')->getClientOriginalExtension(),
                'type' => File::FILE_DEFAULT
            ]);
        }

        return redirect(locale_route('client.account.index'))->with('success', __('client.your_information_saved'));
    }

    public function uploadDocuments(UploadDocumentRequest $request)
    {
        DB::beginTransaction();
        if (!$request['user_document'] && !$request['user_bank_statement'] && !$request['user_selfie_with_document']) {
            return redirect(locale_route('client.account.index'));
        }
        try {

            if ($request->hasFile('document')) {
                $this->saveFile($request->file('user_document'), $request['user_document_type']);
            }

            if ($request->hasFile('user_bank_statement')) {
                $this->saveFile($request->file('bank_statement'), File::BANK_STATEMENT);
            }

            if ($request->hasFile('user_selfie_with_document')) {
                $this->saveFile($request->file('selfie_with_document'), File::SELFIE_WITH_DOCUMENT);
            }

            DB::commit();
            return redirect(locale_route('client.account.index'))->with('success', __('client.document_success_upload'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect(locale_route('client.account.index'))->with('fail', __('client.document_fail_upload'));
        }
    }


    public function saveFile($file, $type)
    {
        $imagename = date('Ymhs') . $file->getClientOriginalName();
        $destination = base_path() . '/storage/app/public/' . 'User' . '/' . auth()->user()->id . '/documents';
        $file->move($destination, $imagename);
        auth()->user()->files()->create([
            'title' => $imagename,
            'path' => 'storage/' . 'User' . '/' . auth()->user()->id . '/documents',
            'format' => $file->getClientOriginalExtension(),
            'type' => $type
        ]);
    }
}
