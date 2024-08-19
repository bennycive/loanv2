<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{

    // Store a newly created attachment in storage
    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'attachment_type' => 'required|string',
    //         'nin_number' => 'nullable|string|unique:attachments,nin_number',
    //         'voter_id_number' => 'nullable|string|unique:attachments,voter_id_number',
    //         'license_number' => 'nullable|string|unique:attachments,license_number',
    //         'front_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'back_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $attachment = new Attachment();
    //     $attachment->user_id = auth()->user()->id; // Set the user_id to the authenticated user
    //     $attachment->attachment_type = $request->input('attachment_type');
    //     $attachment->nin_number = $request->input('nin_number');
    //     $attachment->voter_id_number = $request->input('voter_id_number');
    //     $attachment->license_number = $request->input('license_number');
    //     $attachment->card_number = $request->input('card_number');

    //     if ($request->hasFile('front_image')) {
    //         $frontImagePath = $request->file('front_image')->store('attachments', 'public');
    //         $attachment->front_image = $frontImagePath;
    //     }

    //     if ($request->hasFile('back_image')) {
    //         $backImagePath = $request->file('back_image')->store('attachments', 'public');
    //         $attachment->back_image = $backImagePath;
    //     }

    //     $attachment->save();

    //     $notify[] = ['success', 'Attachment saved successfully'];
    //     return back()->withNotify($notify);

    // }

    public function store(Request $request)
    {
        $request->validate([
            'attachment_type' => 'required|string',
            'nin_number' => 'nullable|string|unique:attachments,nin_number',
            'voter_id_number' => 'nullable|string|unique:attachments,voter_id_number',
            'license_number' => 'nullable|string|unique:attachments,license_number',
            'front_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'back_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $attachment = new Attachment();
        $attachment->user_id = auth()->user()->id; // Set the user_id to the authenticated user
        $attachment->attachment_type = $request->input('attachment_type');
        $attachment->nin_number = $request->input('nin_number');
        $attachment->voter_id_number = $request->input('voter_id_number');
        $attachment->license_number = $request->input('license_number');
        $attachment->card_number = $request->input('card_number');

        // Store front image
        if ($request->hasFile('front_image')) {
            // Save the image in public/assets/attachments
            $frontImagePath = $request->file('front_image')->store('assets/attachments', 'public');
            $attachment->front_image = $frontImagePath;
        }

        // Store back image
        if ($request->hasFile('back_image')) {
            // Save the image in public/assets/attachments
            $backImagePath = $request->file('back_image')->store('assets/attachments', 'public');
            $attachment->back_image = $backImagePath;
        }

        $attachment->save();

        $notify[] = ['success', 'Attachment saved successfully'];
        return back()->withNotify($notify);

    }

    // Display the specified attachment
    public function show($id)
    {
        $attachment = Attachment::findOrFail($id);
        return view('attachments.show', compact('attachment'));
    }

    // Show the form for editing the specified attachment
    public function edit($id)
    {
        $attachment = Attachment::findOrFail($id);
        return view('attachments.edit', compact('attachment'));
    }

    // Update the specified attachment in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'attachment_type' => 'required|string',
            'card_number' => 'required|string|max:255',
            'front_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'back_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $attachment = Attachment::findOrFail($id);
        $attachment->attachment_type = $request->input('attachment_type');
        $attachment->card_number = $request->input('card_number');

        if ($request->hasFile('front_image')) {
            // Delete old image if it exists
            if ($attachment->front_image) {
                \Storage::disk('public')->delete($attachment->front_image);
            }
            $frontImagePath = $request->file('front_image')->store('attachments', 'public');
            $attachment->front_image = $frontImagePath;
        }

        if ($request->hasFile('back_image')) {
            // Delete old image if it exists
            if ($attachment->back_image) {
                \Storage::disk('public')->delete($attachment->back_image);
            }
            $backImagePath = $request->file('back_image')->store('attachments', 'public');
            $attachment->back_image = $backImagePath;
        }

        $attachment->save();

        $notify[] = ['success', 'Attachment saved successfully'];
        return back()->withNotify($notify);

    }

    // Remove the specified attachment from storage
    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);

        // Delete images if they exist
        if ($attachment->front_image) {
            \Storage::disk('public')->delete($attachment->front_image);
        }
        if ($attachment->back_image) {
            \Storage::disk('public')->delete($attachment->back_image);
        }

        $attachment->delete();

        return redirect()->route('attachments.index')->with('success', 'Attachment deleted successfully.');
    }

}
