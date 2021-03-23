<div class="modal fade right" id="Update_Lessons_Archive_Popup" tabindex="-1" role="dialog" aria-labelledby="popupWinLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupWinLabel">تعديل موعد الدرس</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">التاريخ:</label>
            <input type="date" class="form-control" id="recipient-name" v-model="Lessons_Archive_Date">
            <p class="font-red-sunglo">@{{ errors.date }}</p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closeUpdate_Lessons_Archive" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn btn-warning" @click="Update_Lessons_Archive">حفظ</button>
      </div><!--.modal-footer -->
    </div><!--.modal-content -->
  </div><!--.modal-dialog -->
</div><!--.modal -->