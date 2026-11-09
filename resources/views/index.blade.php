<!DOCTYPE html>
<html lang="ar-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cys_idea.css') }}">
    <title>الصفحة الرئيسية</title>
</head>
<body>
    <header>
        <img src="{{ asset('images/خلفية شفافه بيضاBlue and Purple Illustrative Brain Tech Artificial Intelligence Logo.png') }}" alt="شعار الموقع" class="logo">
        <h1>مرحباً بكم في منصة التنظيم والتركيز</h1>
        <div id="currentTime"></div>
    </header>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
            <li><a href="{{ url('/lectures') }}">جدول المحاضرات</a></li>
            <li><a href="{{ url('/tasks') }}">جدول المهام اليومية</a></li>
            <li><a href="{{ url('/exams') }}">جدول الامتحانات</a></li>
            <li><a href="{{ url('/about') }}">من نحن</a></li>
        </ul>
    </nav>
    <main>
        <section id="features" class="section">
            <h2>مميزات النظام</h2>
            <div class="feature">
                <img src="{{ asset('images/التاريخ2.png') }}" alt="أيقونة التركيز">
                <p>جدولة أسبوعية مريحة</p>
            </div>
            <div class="feature">
                <img src="{{ asset('images/2ساعه.png') }}" alt="أيقونة الجدول">
                <p>إدارة المحاضرات وتنظيمها بكل سهولة</p>
            </div>
            <div class="feature">
                <img src="{{ asset('images/المهام2.png') }}" alt="أيقونة التذكير">
                <p>جدولة المهام اليومية</p>
            </div>
        </section>
    </main>
    <div id="loading-bar" style="width: 0%; height: 4px; background: #007bff; position: fixed; top: 0;"></div>
    <footer>
        <p>© 2024 CYS IDEA - جميع الحقوق محفوظة</p>
    </footer>
    <script src="{{ asset('js/cys_idea.js') }}"></script>
</body>
</html>