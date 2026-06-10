<?php

namespace App\Modules\Admin\Services;

use App\Modules\Authentication\Models\User;
use App\Modules\Listings\Models\Listing;
use App\Modules\Verification\Models\UserVerification;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Payments\Models\Transaction;
use Exception;

class AdminService
{
    public function getDashboardKPIs(): array
    {
        return [
            'total_users' => User::where('role', 'user')->count(),
            'total_listers' => User::where('role', 'lister')->count(),
            'total_listings' => Listing::count(),
            'revenue' => (float) Transaction::where('payment_status', 'completed')->sum('amount'),
            'active_subscriptions' => Subscription::where('status', 'active')->count(),
            'pending_verifications' => UserVerification::where('status', 'pending')->count(),
        ];
    }

    public function getUsersList(string $role = null)
    {
        $query = User::with('profile');
        if ($role) {
            $query->where('role', $role);
        }
        return $query->paginate(20);
    }

    public function updateUser(string $id, array $data): User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user->load('profile');
    }

    public function suspendUser(string $id): void
    {
        $user = User::findOrFail($id);
        $user->status = 'suspended';
        $user->save();
    }

    public function activateUser(string $id): void
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();
    }

    public function deleteUser(string $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function approveListing(string $id): void
    {
        $listing = Listing::findOrFail($id);
        $listing->status = 'active';
        $listing->save();
    }

    public function rejectListing(string $id): void
    {
        $listing = Listing::findOrFail($id);
        $listing->status = 'rejected';
        $listing->save();
    }

    public function featureListing(string $id): void
    {
        $listing = Listing::findOrFail($id);
        $listing->featured = !$listing->featured;
        $listing->save();
    }

    public function deleteListing(string $id): void
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();
    }

    public function getPendingVerifications()
    {
        return UserVerification::where('status', 'pending')->with('user')->get();
    }

    public function verifyUserDocuments(string $verificationId, bool $approve): void
    {
        $verification = UserVerification::findOrFail($verificationId);
        $verification->status = $approve ? 'approved' : 'rejected';
        $verification->verified_at = $approve ? now() : null;
        $verification->save();

        if ($approve) {
            $user = User::find($verification->user_id);
            if ($user) {
                $user->verified = true;
                $user->save();
            }
        }
    }
}
