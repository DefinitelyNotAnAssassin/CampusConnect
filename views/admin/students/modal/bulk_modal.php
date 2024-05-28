<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="my_modal_4.showModal()">Add Students (CSV)</button>
<dialog id="my_modal_4" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Add students.</h3>
        <!-- Form start -->
        <form method="post" action = "../../../php/students/bulk_add_students.php" enctype="multipart/form-data">
            <input type="file" name="students_csv" accept=".csv" required = "">
            <button type="submit" class ="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600">Upload CSV</button>
        </form>
        <!-- Form end -->
    </div>
</dialog>


<script>
    const student_password = document.getElementById('student_password');
    const admin_form = document.getElementById('admin_form');

    admin_form.addEventListener('submit', function(event) {
        if (student_password.value.length < 8) {
            alert('Password should be at least 8 characters.');
            event.preventDefault();
        } else if (!preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-zA-Z]).{8,}$/', student_password.value)) {
            alert('Password should contain at least one special character, one number, and one letter.');
            event.preventDefault();
        }
    });
</script>


<script>

const student_id = document.getElementById('student_id');

student_id.addEventListener('change', function() {
    const student_id = this.value;
    const url = '../../../views/admin/students/check_student_id.php';
    const data = new FormData();
    data.append('student_id', student_id);

    fetch(url, {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                alert('Student ID already exists.');
                this.value = '';
            }
        })
        .catch(error => console.error('Error:', error));
});
</script>


<style>
/* Chrome, Safari, Edge, Opera */
#student_username::-webkit-inner-spin-button,
#student_username::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
#student_username {
  -moz-appearance: textfield;
}
</style>