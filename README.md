# Freedom Wall

Freedom Wall
│
├── Landing/Home
│   ├── Display slogan
│   ├── Add Post (anonymous)
│   └── View Approved Posts (tab)
│
└── Authentication
    ├── Login
    └── Admin Panel (after login)
         └── Posts for Approval
         └── View pending posts
         └── Approve post
         └── Decline post
         └── Logout

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
