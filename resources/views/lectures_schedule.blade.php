<!DOCTYPE html>
<html lang="ar-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cys_idea.css') }}">
    <title>جدول المحاضرات</title>
</head>
<body>

    @if (session('success'))
    <div class="toast show">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const toast = document.querySelector('.toast');
            if (toast) {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 500); // اختياري: إزالة العنصر تمامًا
            }
        }, 2000); // مدة الظهور: 2 ثانية
    </script>
    @endif

    <header>
        <img src="images/خلفية شفافه بيضاBlue and Purple Illustrative Brain Tech Artificial Intelligence Logo.png" alt="شعار الموقع" class="logo">
        <h1></h1>
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
        <h2>إضافة محاضرة جديدة</h2>
        <form action="{{ url('/lectures') }}" method="POST">
        @csrf
        <label for="subjectName">اسم المحاضرة:</label>
        <input type="text" id="subjectName" name="subjectName" placeholder="اسم المحاضرة" required>
        
        <label for="startTime">وقت البدء:</label>
        <input type="time" id="startTime" name="startTime" required>
        
        <label for="endTime">وقت الإنتهاء:</label>
        <input type="time" id="endTime" name="endTime" required>
        
        <label for="dayOfWeek">اليوم:</label>
        <select type="text" id="dayOfWeek" name="dayOfWeek" required>
            <option value="الأحد">الأحد</option>
            <option value="الإثنين">الإثنين</option>
            <option value="الثلاثاء">الثلاثاء</option>
            <option value="الأربعاء">الأربعاء</option>
            <option value="الخميس">الخميس</option>
            <option value="السبت">السبت</option>
        </select>
        
        <button type="submit" class="add-button">إضافة محاضرة</button>
        </form>
        <h2>المحاضرات المضافة</h2>
        <table id="weeklySchedule">
            <thead>
                <tr>
                    <th>اليوم</th>
                    <th>المحاضرة</th>
                    <th>وقت البدء</th>
                    <th>وقت الإنتهاء</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($lectures as $lecture)
        <tr>
            <td>{{ $lecture->day }}</td>
            <td>{{ $lecture->subject }}</td>
            <td>{{ $lecture->startTime }}</td>
            <td>{{ $lecture->endTime }}</td>
            <td>إجراءات</td>
        </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="loading-bar" style="width: 0%; height: 4px; background: #007bff; position: fixed; top: 0;"></div>
    <footer>
        <p>© 2024 CYS IDEA - جميع الحقوق محفوظة</p>
    </footer>
    <script src="{{ asset('js/cys_idea.js') }}"></script>
</body>
</html>