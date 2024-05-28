<button class="btn btn-sm bg-red-500 border-none hover:bg-red-600" onclick="showModal('my_modal_3<?php echo $subjectList['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm5.293 15.293a.999.999 0 1 1-1.414 1.414L12 13.414l-4.879 4.879a.999.999 0 1 1-1.414-1.414L10.586 12 5.707 7.121a.999.999 0 1 1 1.414-1.414L12 10.586l4.879-4.879a.999.999 0 1 1 1.414 1.414L13.414 12l4.879 4.879z" clip-rule="evenodd" />
    </svg>
</button>
<!-- Delete Modal -->
<dialog id="my_modal_3<?php echo $subjectList['id']; ?>" class="modal text-gray-50">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="document.getElementById('my_modal_<?php echo $subjectList['id']; ?>').close()">✕</button>
        </form>
        <h3 class="font-bold text-lg">Reject Credential Request?</h3>
        <form action="../../../php/request/reject.php" method="post">
            <p class="py-7 font-semibold text-base">Are you sure you want to reject this request?</p>
            <input hidden type="" name="id" value="<?php echo $subjectList['id']; ?>" /> <!-- Corrected 'nane' to 'name' -->

            <!-- Reason Field -->
            <label for="reason" class="font-semibold text-base">Reason for rejection:</label>
            <br>
            <textarea class = "w-full" id="reason" name="reject_reason" required></textarea>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-block bg-red-500 text-gray-50 font-semibold text-base">Reject request</button>
        </form>
    </div>
</dialog>