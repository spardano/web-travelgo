<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Angkutan;
use App\Models\AreaKerja;
use App\Models\Jadwal;
use App\Models\JenisKelas;
use App\Models\PaymentTransactions;
use App\Models\Permission;
use App\Models\Refund;
use App\Models\Trayek;
use App\Models\User;
use App\Policies\ActivityPolicy;
use App\Policies\AngkutanPolicy;
use App\Policies\AreaKerjaPolicy;
use App\Policies\JadwalsPolicy;
use App\Policies\JenisKelasPolicy;
use App\Policies\PaymentTransactionPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RefundPolicy;
use App\Policies\RolePolicy;
use App\Policies\TrayekPolicy;
use App\Policies\UserPolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Spatie\Activitylog\Models\Activity;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        Activity::class => ActivityPolicy::class,
        Angkutan::class => AngkutanPolicy::class,
        AreaKerja::class => AreaKerjaPolicy::class,
        Jadwal::class => JadwalsPolicy::class,
        JenisKelas::class => JenisKelasPolicy::class,
        PaymentTransactions::class => PaymentTransactionPolicy::class,
        Refund::class => RefundPolicy::class,
        Trayek::class => TrayekPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verifikasi Email')
                ->line('Tekan tombol dibawah ini untuk verifikasi email.')
                ->action('Verifikasi Email', $url);
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
