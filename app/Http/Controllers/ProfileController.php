<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddExperienceRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Http\Requests\UpdateIntroRequest;
use App\Http\Requests\AddEducationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        @ini_set('memory_limit', '512M');
    }
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile(); // Get profile or create a new empty one

        // Ensure JSON fields are initialized as arrays if they are null
        $profile->experience = $profile->experience ?? [];
        $profile->education = $profile->education ?? [];
        $profile->certifications = $profile->certifications ?? [];
        $profile->skills = $profile->skills ?? [];
        $profile->languages = $profile->languages ?? [];

        $title = 'Profile | LinkedIn';
        return view('profile', compact('title', 'user', 'profile'));
    }

    public function updateIntro(UpdateIntroRequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        $validated = $request->validated();

        // Update user name (first and last name)
        $user->name = $validated['first_name'] . ' ' . $validated['last_name'];
        $user->save();

        // Update profile fields
        $profile->headline = $validated['headline'];
        $profile->location = $validated['location'];
        $profile->industry = $validated['industry'];
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'Intro updated successfully.']);
    }

    public function updateAbout(UpdateAboutRequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        $validated = $request->validated();

        $profile->about = $validated['about'];
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'About updated successfully.']);
    }

    public function updateProfilePicture(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_picture' => ['required', 'image', 'max:5120'], // Max 5MB
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        // Delete old profile picture if exists
        if ($profile->profile_picture) {
            Storage::disk('public')->delete($profile->profile_picture);
        }

        // Store the new profile picture
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        $profile->profile_picture = $path;
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'Profile picture updated successfully.', 'file_url' => asset('storage/' . $path)]);
    }

    public function updateCoverPhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cover_photo' => ['required', 'image', 'max:10240'], // Max 10MB
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        // Delete old cover photo if exists
        if ($profile->cover_photo) {
            Storage::disk('public')->delete($profile->cover_photo);
        }

        // Store the new cover photo
        $path = $request->file('cover_photo')->store('cover_photos', 'public');

        $profile->cover_photo = $path;
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'Cover photo updated successfully.', 'file_url' => asset('storage/' . $path)]);
    }

    public function addExperience(AddExperienceRequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        $validated = $request->validated();

        $experience = $profile->experience ?? [];
        $experience[] = $validated;

        $profile->experience = $experience;
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'Experience added successfully.', 'experience' => $validated]);
    }

    /**
     * Add a new education entry to the user's profile.
     *
     * @param  \App\Http\Requests\AddEducationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addEducation(AddEducationRequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        $validated = $request->validated();

        $education = $profile->education ?? [];
        $education[] = $validated;

        $profile->education = $education;
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'Education added successfully.', 'education' => $validated]);
    }

    /**
     * Add a new license or certification entry to the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addLicenseOrCertification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'issuing_organization' => ['required', 'string', 'max:255'],
            'issue_date' => ['nullable', 'date'],
            'expiry_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'credential_id' => ['nullable', 'string', 'max:255'],
            'credential_url' => ['nullable', 'url', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        $validated = $validator->validated();

        $certifications = $profile->certifications ?? [];
        $certifications[] = $validated;

        $profile->certifications = $certifications;
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'License or certification added successfully.', 'certification' => $validated]);
    }

    /**
     * Add a new skill entry to the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSkill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        $validated = $validator->validated();

        $skills = $profile->skills ?? [];
        $skills[] = $validated;

        $profile->skills = $skills;
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'Skill added successfully.', 'skill' => $validated]);
    }

    /**
     * Add a new language entry to the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addLanguage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'proficiency' => ['required', 'string', 'max:255'], // Assuming proficiency is a string
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        $validated = $validator->validated();

        $languages = $profile->languages ?? [];
        $languages[] = $validated;

        $profile->languages = $languages;
        $profile->user_id = $user->id; // Ensure user_id is set for new profiles
        $profile->save();

        return response()->json(['success' => true, 'message' => 'Language added successfully.', 'language' => $validated]);
    }

    // TODO: Implement methods for updating Licenses, Skills, and Languages
}
