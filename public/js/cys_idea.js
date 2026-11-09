// استرجاع المحاضرات والمهام والاختبارات من localStorage أو تعيين مصفوفة فارغة
const lectures = JSON.parse(localStorage.getItem("lectures")) || []; // استرجاع المحاضرات
const tasks = JSON.parse(localStorage.getItem("tasks")) || []; // استرجاع المهام
const exams = JSON.parse(localStorage.getItem("exams")) || []; // استرجاع الاختبارات

// دالة لتحديث الوقت الحالي
const updateTime = () => {
    const now = new Date(); // الحصول على الوقت الحالي
    document.getElementById('currentTime').textContent = now.toLocaleTimeString('ar-EG');
}; // عرض الوقت بتنسيق عربي


/* // دالة لإضافة محاضرة
const addLecture = () => {
    const subject = document.getElementById('subjectName').value;
    const startTime = document.getElementById('startTime').value;
    const endTime = document.getElementById('endTime').value;
    const day = document.getElementById('dayOfWeek').value;

    if (subject && startTime && endTime && day) {
        simulateLoading(); // يظهر الشريط
        const lecture = { subject, startTime, endTime, day };
        lectures.push(lecture);
        localStorage.setItem("lectures", JSON.stringify(lectures));
        displayLectures();
        showToast('تمت إضافة المحاضرة بنجاح!');

        // تفريغ الحقول
        document.getElementById('subjectName').value = '';
        document.getElementById('startTime').value = '';
        document.getElementById('endTime').value = '';
        document.getElementById('dayOfWeek').value = '';
    } else {
        alert('يرجى ملء جميع الحقول');
    }
};

// دالة لعرض المحاضرات في الجدول الأسبوعي
const displayLectures = () => {
    const table = document.getElementById('weeklySchedule').getElementsByTagName('tbody')[0];
    table.innerHTML = ""; // لتفريغ المحتوى السابق عند إعادة العرض

    lectures.forEach((lecture, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `<td>${lecture.day}</td><td>${lecture.subject}</td><td>${lecture.startTime}</td><td>${lecture.endTime}</td><td><button class="delete-button" onclick="deleteLecture(${index})">حذف</button></td>`; // إضافة بيانات المحاضرة
        table.appendChild(row); // إضافة الصف إلى الجدول
    });
};

// دالة لحذف المحاضرة
const deleteLecture = (index) => {
    lectures.splice(index, 1); // حذف المحاضرة من المصفوفة
    localStorage.setItem("lectures", JSON.stringify(lectures)); // تحديث المحاضرات في localStorage
    displayLectures(); // إعادة عرض المحاضرات
    alert('تم حذف المحاضرة بنجاح!'); // إضافة رسالة تأكيد للحذف
};

// دالة لإضافة مهمة
const addTask = () => {
    const taskName = document.getElementById('taskName').value;
    const taskDate = document.getElementById('taskDate').value;
    const taskTime = document.getElementById('taskTime').value;

    if (taskName && taskDate && taskTime) {
        simulateLoading(); // إظهار شريط التحميل
        const task = { name: taskName, date: taskDate, time: taskTime };
        tasks.push(task);
        localStorage.setItem("tasks", JSON.stringify(tasks));
        displayTasks(); // يعرض المهام الجديده اللي انضافت
        showToast('تمت إضافة المهمة بنجاح!');

        // تفريغ الحقول
        document.getElementById('taskName').value = '';
        document.getElementById('taskDate').value = '';
        document.getElementById('taskTime').value = '';
    } else {
        alert('يرجى ملء جميع الحقول');
    }
};

// دالة لعرض المهام
const displayTasks = () => {
    const table = document.getElementById('taskList').getElementsByTagName('tbody')[0];// الحصول على tbody في جدول المهام
    table.innerHTML = ""; // لتفريغ المحتوى السابق عند إعادة العرض

    // تكرار المهام لعرضها في الجدول
    tasks.forEach((task, index) => {
        const row = document.createElement('tr'); // إنشاء صف جديد
        row.innerHTML = `<td>${task.name}</td><td>${task.date}</td><td>${task.time}</td><td><button class="delete-button" onclick="deleteTask(${index})">حذف</button></td>`; // إضافة بيانات المهمة
        table.appendChild(row); // إضافة الصف إلى الجدول
    });
};

// دالة لحذف المهمة
const deleteTask = (index) => {
    tasks.splice(index, 1); // حذف المهمة من المصفوفة
    localStorage.setItem("tasks", JSON.stringify(tasks)); // تحديث المهام في localStorage
    displayTasks(); // إعادة عرض المهام
    alert('تم حذف المهمة بنجاح!'); // إضافة رسالة تأكيد للحذف
};

// دالة لإضافة اختبار
const addExam = () => {
    const examSubject = document.getElementById('examSubject').value;
    const examDate = document.getElementById('examDate').value;
    const examTime = document.getElementById('examTime').value;

    if (examSubject && examDate && examTime) {
        simulateLoading(); // يظهر الشريط
        const exam = { subject: examSubject, date: examDate, time: examTime };
        exams.push(exam);
        localStorage.setItem("exams", JSON.stringify(exams));
        displayExams();
        showToast('تمت إضافة الاختبار بنجاح!');

        // تفريغ الحقول
        document.getElementById('examSubject').value = '';
        document.getElementById('examDate').value = '';
        document.getElementById('examTime').value = '';
    } else {
        alert('يرجى ملء جميع الحقول');
    }
};

// دالة لعرض الاختبارات
const displayExams = () => {
    const table = document.getElementById('examList').getElementsByTagName('tbody')[0];// الحصول على tbody في جدول الاختبارات
    table.innerHTML = ""; // لتفريغ المحتوى السابق عند إعادة العرض

    // تكرار الاختبارات لعرضها في الجدول
    exams.forEach((exam, index) => {
        const row = document.createElement('tr'); // إنشاء صف جديد
        row.innerHTML = `<td>${exam.subject}</td><td>${exam.date}</td><td>${exam.time}</td><td><button class="delete-button" onclick="deleteExam(${index})">حذف</button></td>`; // إضافة بيانات الاختبار
        table.appendChild(row); // إضافة الصف إلى الجدول
    });
};

// دالة لحذف الاختبار
const deleteExam = (index) => {
    exams.splice(index, 1); // حذف الاختبار من المصفوفة
    localStorage.setItem("exams", JSON.stringify(exams)); // تحديث الاختبارات في localStorage
    displayExams(); // إعادة عرض الاختبارات
    alert('تم حذف الامتحان بنجاح!'); // إضافة رسالة تأكيد للحذف
};*/

// استدعاء الدوال عند تحميل الصفحة
window.onload = () => {
    updateTime(); // تحديث الوقت عند تحميل الصفحة
    /*
    if (document.getElementById('weeklySchedule')) displayLectures(); // عرض المحاضرات إذا كانت موجودة
    if (document.getElementById('taskList')) displayTasks(); // عرض المهام إذا كانت موجودة
    if (document.getElementById('examList')) displayExams(); // عرض الاختبارات إذا كانت موجودة
    */

    // إضافة الوقت الحالي
    setInterval(updateTime, 1000); // تحديث الوقت كل ثانية

    // تحديد الرابط النشط
    const currentLocation = window.location.pathname; // = الحصول على مسار الصفحة الحاليه = النشطة
    const navLinks = document.querySelectorAll('nav ul li a'); // الحصول على جميع روابط التنقل

        // إزالة الفئة النشطة من جميع الروابط
    navLinks.forEach(link => {
        link.classList.remove('active');
    });

    // التحقق من الرابط النشط وإضافته إلى الفئة
    navLinks.forEach(link => {
        if (link.href.includes(currentLocation)) {
            link.classList.add('active'); // إضافة فئة النشط
        }
    });
};

// الشريط الاكتمال العلوي للصفحات
function simulateLoading() {
    const loadingBar = document.getElementById('loading-bar');
    if (!loadingBar) return; // الخروج فورًا إن لم يكن موجوداً
    let width = 2;

    function updateBar() {
        if (width < 100) {
            width += 2; // زيادة تدريجية 4% لجعل التقدم بطيء
            loadingBar.style.width = width + '%';
            requestAnimationFrame(updateBar); // استمرار التحديث
        } else {
            setTimeout(() => {
                loadingBar.style.width = '0%'; // إخفاء الشريط بعد اكتماله
            }, 550); // التأخير قبل الاختفاء
        }
    }

    // استخدام setTimeout لتأخير البداية قليلاً في حال الإضافة
    setTimeout(() => {
        requestAnimationFrame(updateBar); // بدء التحديث السلس
    }, 500); // تأخير صغير للبدء
}
// Call this function when adding a task, lecture, or exam
simulateLoading();

/*
// للرساله
function showToast(message) {
    const toast = document.createElement('div');  // إنشاء العنصر للإشعار
    toast.className = 'toast';  // إضافة الفئة (CSS)

    // إضافة الأيقونة "علامة صح" والنص "Success"
    toast.innerHTML = `
        <div style="display: flex; align-items: center;">
            <!-- أيقونة علامة صح (Checkmark) -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path fill="white" d="M10 15l-3.5-3.5 1.4-1.4L10 12.2l6.3-6.3 1.4 1.4z"/>
            </svg>
            <div class="message" style="margin-left: 10px;">
                <div>Success</div>  <!-- النص "Success" -->
                <div>${message}</div>
            </div>
        </div>
    `;

    document.body.appendChild(toast);  // إضافة الإشعار إلى الصفحة
    toast.classList.add('show');  // عرض الرسالة مع التأثيرات

    // إخفاء الإشعار بعد 1 ثانية (1000ms)
    setTimeout(() => {
        toast.classList.remove('show');  // إزالة الفئة لإخفاء الإشعار
        setTimeout(() => {
            document.body.removeChild(toast);  // إزالة العنصر نهائيًا بعد التأثير
        }, 300);  // فترة التأخير بعد الاختفاء
    }, 1000);  // مدة ظهور الرسالة 1 ثانية
}
*/