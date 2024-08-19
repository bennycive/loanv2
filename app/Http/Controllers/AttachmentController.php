<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    // Show the form for creating a new attachment
    public function create()
    {
        return view('attachments.create');
    }

    // Store a newly created attachment in storage
    public function store(Request $request)
    {
        $request->validate([
            'attachment_type' => 'required|string',
            'card_number' => 'required|string|max:255',
            'front_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'back_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $attachment = new Attachment();
        $attachment->attachment_type = $request->input('attachment_type');
        $attachment->card_number = $request->input('card_number');

        if ($request->hasFile('front_image')) {
            $frontImagePath = $request->file('front_image')->store('attachments', 'public');
            $attachment->front_image = $frontImagePath;
        }

        if ($request->hasFile('back_image')) {
            $backImagePath = $request->file('back_image')->store('attachments', 'public');
            $attachment->back_image = $backImagePath;
        }

        $attachment->save();

        return redirect()->route('attachments.index')->with('success', 'Attachment saved successfully.');
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

        return redirect()->route('attachments.index')->with('success', 'Attachment updated successfully.');
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
