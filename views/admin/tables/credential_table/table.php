<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Credentials</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-10">Credentials</p>
    <!-- <button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4">Add users</button> -->
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                <th class="border-b border-gray-200 flex items-center"><input type="checkbox" id="checkAll" class ="mx-2">Select All</th>
                    <th class="border-b border-gray-200">No.</th>
                    <th class="border-b border-gray-200">Student Name.</th>
                    <th class="border-b border-gray-200">Type of Credential</th>
                    <th class="border-b border-gray-200">Message</th>
                    <th class="border-b border-gray-200">Status</th>
                    <th class="border-b border-gray-200">Date submitted</th>
                    <th class="border-b border-gray-200">Rejection reason</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <?php if (!empty($credentialList)) : ?>
                    <?php foreach ($credentialList as $subjectList) : ?>

                        <tr class="hover:bg-slate-200">
                        <td class="border-b text-sm border-gray-200 text-center"><input type="checkbox" class="rowCheckbox" data-id="<?php echo $subjectList['id']; ?>"></td>
                            <th class="border-b text-sm border-gray-200"><?php echo $subjectList['id']; ?></th>
                            <th class="border-b text-sm border-gray-200"><?php echo $subjectList['student_fullname']; ?></th>
                            <td class="border-b text-sm border-gray-200"><?php echo $subjectList['request']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $subjectList['message']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $subjectList['status']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $subjectList['date_created']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $subjectList['rejection_reason']; ?></td>
                            <td class="border-b text-sm border-gray-200">
                                <?php include '../../admin/credentials/modal/approve_modal.php'; ?>
                                <?php include '../../admin/credentials/modal/reject_modal.php'; ?>
                                
                                <?php include '../../admin/credentials/modal/view_modal.php'; ?>

                            </td>
                        </tr>
                    <?php

                    endforeach;
                else :
                    ?>
                    <tr>
                        <td colspan="8" class="border-b text-sm border-gray-200 text-center">No Credentials found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php include '../tables/pagination/pagination.php'; ?>
    </div>
</div>

<?php include '../tables/scripts/paginate.php'; ?>



<?php include '../tables/scripts/paginate.php'; ?>
<script>
    function showModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.showModal();
        }
    }
</script>



<script>
    // Handle the "check all" checkbox
    document.getElementById('checkAll').addEventListener('change', function() {
        var checkboxes = document.getElementsByClassName('rowCheckbox');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    });

    // Handle the action for the selected rows
    function doAction() {
        var checkboxes = document.getElementsByClassName('rowCheckbox');
        var selectedIds = [];
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedIds.push(checkboxes[i].dataset.id);
            }
        }
        // Now you have an array of selected IDs. You can send them to the server, etc.
        console.log(selectedIds);
    }
</script>