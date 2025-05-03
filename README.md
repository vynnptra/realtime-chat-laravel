
````markdown
# 📬 Realtime Chat Laravel

A simple realtime chat application built using **Laravel**, **Laravel Echo**, **Pusher**, and **Bootstrap**. This project demonstrates how to implement realtime communication in Laravel using event broadcasting and frontend listeners.

---

## 🚀 Features

- 🔐 User Authentication (Login & Register)
- 💬 One-on-one real-time chat
- 🟢 Online user indicator
- 🕓 Chat history per user
- ⚡ Laravel Echo + Pusher integration

---

## 🛠️ Tech Stack

- **Laravel 10+**
- **Laravel Echo**
- **Pusher**
- **Bootstrap 5**
- **jQuery**

---

## 📦 Installation

Follow the steps below to set up the project on your local machine.

### 1. Clone the Repository

```bash
git clone https://github.com/vynnptra/realtime-chat-laravel.git
cd realtime-chat-laravel
````

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Setup Environment

Copy the `.env` file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your **database** and **Pusher** credentials.

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

BROADCAST_DRIVER=pusher

PUSHER_APP_ID=your_pusher_app_id
PUSHER_APP_KEY=your_pusher_app_key
PUSHER_APP_SECRET=your_pusher_app_secret
PUSHER_APP_CLUSTER=your_pusher_cluster
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Compile Assets

```bash
npm run dev
```

### 6. Start the Application

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

---

## 🧠 Notes

* Make sure you have a [Pusher](https://pusher.com/) account and set up a new app.
* Ensure your broadcasting configuration is correct in `config/broadcasting.php`.

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!
Feel free to fork this repo and submit a pull request.

---

Made with ❤️ by [@vynnptra](https://github.com/vynnptra)

```

---

```
