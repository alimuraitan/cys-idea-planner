<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>من نحن - CYS IDEA</title>
    <link rel="stylesheet" href="{{ asset('css/cys_idea.css') }}">

</head>
<body>
    <header>
        <img src="images/خلفية شفافه بيضاBlue and Purple Illustrative Brain Tech Artificial Intelligence Logo.png" alt="شعار الموقع" class="logo"> <!-- إضافة اللوقو -->
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
    <div class="container">
        <h2>عن المشروع</h2>
        <p>CYS IDEA مشروع فردي طوّره Ali Bin Muraitan لمساعدة الطلاب على تنظيم المحاضرات والمهام ومواعيد الامتحانات.</p>
        <h2>هدف المشروع</h2>
        <p>يجمع التطبيق الجداول والمهام الدراسية في مكان واحد لتسهيل متابعة الالتزامات اليومية.</p>
    </div>
    <div id="loading-bar" style="width: 0%; height: 4px; background: #007bff; position: fixed; top: 0;"></div>
    <footer>
        <p>© 2024 CYS IDEA - جميع الحقوق محفوظة</p>
    </footer>
    <script src="{{ asset('js/cys_idea.js') }}"></script>
</body>
</html>
