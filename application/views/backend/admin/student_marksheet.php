<br><br><br>
<link href="assets/css/export_print.css" rel="stylesheet">

                <div class="transcript-header m-t-10 m-b-20">
                    <div class="transcript-student-info f-s-15">
                        <h2 class="m-0"><?php echo $student_name;?> </h2>
                        <p class="m-t-5 m-b-0"><b>Sex :</b> <?php echo $student_data->sex;?></p>
                        <p class="m-t-5 m-b-0"><b>Date of Birth :</b> <?php echo $student_data->birthday;?></p>
                        <p class="m-t-5 m-b-0"><b>Student ID :</b><?php echo $student_data->student_no;?></p>
                        <p class="m-t-5 m-b-0"><b>Course :</b> <?php echo $this->crud_model->get_class_name($student_data->class_id);?></p>
                    </div>
                    <div class="transcript-student-overview">
					
                        <table class="table">
					<td colspan="2"><div >
                        TESTIMONIAL 
                    </div></td>
                            <tr>
                                <td class="p-r-30">Cumulative GPA</td>
                                <td>3.22</td>
                            </tr>
                            <tr>
                                <td class="p-r-30">Total Credit Attempted</td>
                                <td>18.33</td>
                            </tr>
                            <tr>
                                <td class="p-r-30">Total Credit Earned</td>
                                <td>18.33</td>
                            </tr>
                        </table>
                    </div>
                </div>


                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="vertical-align: top; padding-right: 15px;" width="50%">
                            
							<?php for($k=1;$k<$this->crud_model->get_course_years($class_id)+1;$k++) {
	
$studyper = $this->db->get('sessionp')->result_array();
foreach($studyper as $studydat){	
	
?>
							<div class="item" style="padding-bottom: 15px;">
							<h4 class="f-s-15 m-b-0 m-t-0"><span class="text-blue">Period of study</span> - <?php echo $studydat['name'];?> (Yr <?php echo $k;?>)</h4> <h4 style="float:right;" class="f-s-15 m-b-0 m-t-0"><span class="text-blue">Year of study</span> - <?php echo $k;?> </h4>
							<p class="m-t-0 m-b-5">Academic Year : 05/2020</p>
							<table class="invoice-table table-bordered">
							<thead>
							<tr>
							<th class="text-left f-s-12">Course Code</th>
							<th class="text-left f-s-12">Course Name</th>
							<th class="text-left f-s-12" width="20%">CU</th>							
							<th class="bg-grey f-s-12" width="5%">Score</th>
							<th class="bg-grey f-s-12" width="5%">Grade</th>
							<th class="text-left f-s-12" width="15%">GP Value</th>
							</tr>
							</thead>
							<tbody>
						<?php
						$markdata = $this->db->get_where('mark' , array('class_id' =>$class_id,'yos' =>$k,'tos' =>$studydat['name'],'student_id' =>$student_id))->result_array();
						foreach($markdata as $marks){
							
						?>
							<tr>
							<td><?php echo $this->crud_model->get_subject_name_by_id2($marks['subject_id'])->unit_code?></td>
							<td><?php echo $this->crud_model->get_subject_name_by_id2($marks['subject_id'])->name?></td>
							<td><?php echo  $this->crud_model->get_subject_name_by_id2($marks['subject_id'])->credit_uints?>.0 </td>
							<td><?php echo $marks['mark_obtained']?>.0 </td>
							<td class="bg-grey f-s-16 text-center"><b><?php echo $this->crud_model->get_grade($marks['mark_obtained'])?></b></td>
							<td><?php echo $this->crud_model->get_grade2($marks['mark_obtained'])?></td>
							<td><?php echo $sum=($this->crud_model->get_subject_name_by_id2($marks['subject_id'])->credit_uints*$this->crud_model->get_grade2($marks['mark_obtained']))?></td>
							
							</tr>
						<?php 
						}
						?>
							</tbody>
							<tfoot><tr><td colspan="6"><p class="text-blue f-s-13">Credit Attempted: 4.00 / Credit Earned: 4.00 / GPA: 4.00</p></td></tr></tfoot></table>
							</div>
							
							<?php 
							echo $tota+=$sum;
							}

							} ?>
						
							
						</td>
                         </tr>
                </table>
