<!-- Modal HTML -->
<div id="myModal" class="modal fade" style="z-index: 999999;">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title">Add User Member</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="add_user.php" method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>ชื่อ</label>
							<input type="text" class="form-control" name="firstname" placeholder="Firstname" required="required">		
						</div>
						<div class="form-group col-md-6">
							<label>นามสกุล</label>
							<input type="text" class="form-control" name="surname" placeholder="Lastname" required="required">		
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="text" class="form-control" name="email" placeholder="Email" required="required">		
						</div>
					
                        <div class="form-group col-md-6">
                            <label> User Level</label>
                            <div class="col-sm-12">
                                <select class="form-control" name='proof'>
                                    <option value='user'>user</option>
                                    <option value='admin'>admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>รหัสผ่าน</label>
							<input type="password" class="form-control" name="password" placeholder="Password" required="required">		
						</div>
						<div class="form-group col-md-6">
							<label>ยืนยัน รหัสผ่าน</label>
							<input type="password" class="form-control" name="psw-repeat" placeholder="Repeat Password" required="required">		
						</div>
					</div>  
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">เพิ่มผู้ใช้</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>     

