<!-- Button to open modal -->
<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="document.getElementById('my_modal_1').showModal()">Add Attendance</button>
<dialog id="my_modal_1" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Add Attendance.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/attendance/add_attendance.php" method="post">
            <div class="col-span-2">
                <h3 class="font-bold text-lg mb-8">Primary details.</h3>
                <div class="grid grid-cols-3 gap-2 mb-5">
                    <div>
                        <label for="student" class="block mb-2 text-sm font-medium text-gray-50">Select a student</label>
                        <?php
                        include '../../../php/db_connect.php';
                        $teacher_id = $_SESSION['user_id'];
                        $query = "SELECT student_id,teacher_id, student_fname, student_lname, MAX(subject_id) as subject_id, MAX(teacher_id) as teacher_id, MAX(student_schedule_subject_name) as student_schedule_subject_name, MAX(grade_level) as grade_level, MAX(school_year) as school_year, MAX(semester) as semester FROM student_with_subjects WHERE teacher_id = '$teacher_id' GROUP BY student_id";
                        $result = $conn->query($query);
                        if ($result) {
                        ?>
                            <select required name="select_subject" class="text-gray-50 select select-bordered w-full max-w">
                                <option disabled selected>Set attendance for student</option>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"" . $row['student_id'] . "," . $row['teacher_id'] . "," . $row['student_fname'] . "," . $row['student_lname'] . "\">" . $row['student_fname'] . " " . $row['student_lname'] . "</option>";
                                }
                                ?>
                            </select>
                        <?php
                            $result->free();
                        } else {
                            echo "Error executing query: " . $conn->error;
                        }
                        ?>
                    </div>
                    <div>
                        <label for="days_present" class="block mb-2 text-sm font-medium text-gray-50">Days Present</label>
                        <input type="text" name="days_present" id="days_present" class="input input-bordered input-md w-full" placeholder="Days Present" required="">
                    </div>

                    <div>
                        <label for="days_absent" class="block mb-2 text-sm font-medium text-gray-50">Days Absent</label>
                        <input type="text" name="days_absent" id="days_absent" class="input input-bordered input-md w-full" placeholder="Days Absent" required="">
                    </div>

                    
                    <div>
                        <label for="final" class="block mb-2 text-sm font-medium text-gray-50">Month</label>
                        <input type="text" name="final" id="final" class="input input-bordered input-md w-full" placeholder="month" required="">
                    </div>
                </div>

                <div class="modal-action">
                    <button type="submit" class="btn bg-green-700 border-none text-gray-200 hover:bg-green-900 px-12">Submit</button>
                </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>