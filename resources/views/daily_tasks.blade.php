<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cys_idea.css') }}">
    <title>جدول المهام اليومية</title>
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
        <img src="{{ asset('images/خلفية شفافه بيضاBlue and Purple Illustrative Brain Tech Artificial Intelligence Logo.png') }}" alt="شعار الموقع" class="logo">
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
        <h2>إضافة مهمة جديدة</h2>
        <form action="{{ url('/tasks') }}" method="POST">
        @csrf
        <label for="taskName">اسم المهمة:</label>
        <input type="text" id="taskName" name="taskName" placeholder="Assignment" required>
        
        <label for="taskDate">التاريخ:</label>
        <input type="date" id="taskDate" name="taskDate" required>
        
        <label for="taskTime">الوقت:</label>
        <input type="time" id="taskTime" name="taskTime" required>
        
        <button type="submit" class="add-button">إضافة مهمة</button>
        </form>
        
        <h2>المهام المضافة</h2>
        <table id="taskList">
            <thead>
                <tr>
                    <th>اسم المهمة</th>
                    <th>التاريخ</th>
                    <th>الوقت</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
            @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->date }}</td>
            <td>{{ $task->time }}</td>
            <td>إجراءات</td>
        </tr>
            @endforeach
            </tbody>

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