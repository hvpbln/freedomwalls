# Freedom Wall

Freedom Wall<br>
│<br>
├── Landing/Home<br>
│   ├── Display slogan<br>
│   ├── Add Post (anonymous)<br>
│   └── View Approved Posts (tab)<br>
│<br>
└── Authentication<br>
    ├── Login<br>
    └── Admin Panel (after login)<br>
         └── Posts for Approval<br>
         └── View pending posts<br>
         └── Approve post<br>
         └── Decline post<br>
         └── Logout<br>

---

## setup instructions

### 1. install dependencies
```
composer install
npm install && npm run dev
```

### 2. configure environment
```
cp .env.example .env
php artisan key:generate
```

### 3. create tables
```
php artisan migrate
```

### 4. create admin account
```
php artisan tinker
```
```
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('admin123'),
]);
```

### 5. run
```
php artisan serve
```
