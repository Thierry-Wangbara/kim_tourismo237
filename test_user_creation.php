<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

try {
    $user = new User();
    $user->first_name = 'Test';
    $user->last_name = 'User';
    $user->email = 'test@example.com';
    $user->password = Hash::make('password');
    $user->account_type = 'tourist';
    $user->phone = '+237 6XX XX XX XX';
    $user->save();
    
    echo "✅ User created successfully with ID: " . $user->id . "\n";
    echo "✅ Full name: " . $user->full_name . "\n";
    echo "✅ Account type: " . $user->account_type . "\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
