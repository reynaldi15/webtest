@extends('layout/student-layout')

@section('space-work')
    <h2>Results</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Exam</th>
                <th>Result</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(count($attempts)>0)
                @php $x=1;@endphp
                @foreach ($attempts as $attempt)
                    <tr>
                        <td>{{ $x++ }}</td>
                        <td>{{ $attempt->exam->exam_name }}</td>
                        <td>
                            @if($attempt->status==0)
                                Not Declare
                            @else
                                @if($attempt->marks>=$attempt->exam->pass_marks)
                                    <span style="color:green;">Passed</span>
                                @else
                                <span style="color:red;">Failed</span>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if($attempt->status==0)
                                <span style="color:red;">Pending</span>
                            @else
                                <a href="#" data-id="{{ $attempt->id }}" class="reviewExam" data-toggle="modal" data-target="#reviewQnaModal">Check Result</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">You not attempt any Exam</td>
                </tr>
            @endif
        </tbody>
    </table>
{{-- body --}}
    <div class="modal fade" id="reviewQnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Review Exam</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body review-qna">
                Loadning ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
            
          </div>
        </div>
      </div>

      <div class="modal fade" id="explainationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Explaination</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body ">
                    <p id="explaination"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
          </div>
        </div>
      </div>

      <script>
        $(document).ready(function(){
            $('.reviewExam').click(function(){
                var id=$(this).attr('data-id');
                // $('#attempt_id').val(id);
                $.ajax({
                    url:"{{ route('resultStudentQna') }}",
                    type:"GET",
                    data:{attempt_id: id},
                    success:function(data){
                        // console.log(data);
                        var html='';
                        if (data.success==true) {
                            var data= data.data;
                            if (data.length>0) {
                                for (let i = 0; i < data.length; i++) {
                                    let is_correct='<span style="color:red;" class="fa fa-close"></span>';
                                    if (data[i]['answers']['is_correct']==1) {
                                        is_correct='<span style="color:green;" class="fa fa-check"></span>';
                                    }
                                    let answer=data[i]['answers']['answer'];
                                    html +=`
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h6>Q(`+(i+1)+`).`+data[i]['question']['question']+`</h6>
                                            <p>Answ:-`+answer+` `+is_correct+`</p>`;

                                            if (data[i]['question']['explaination'] !=null) {
                                                html+=`<p><a href="#" data-explaination="`+data[i]['question']['explaination']+`" class="explaination" data-toggle="modal" data-target="#explainationModal">Explaination</a></p>`;
                                            }
                                            html+=`    
                                        </div>
                                    </div>
                                    `;                                    
                                }
                            } else {
                                html+=`<h6>You Didnt attempt any Question</h6>`;
                            }
                        } else {
                            html+=`<p>Having Some issue on serve</p>`;
                        }
                        $('.review-qna').html(html);
                    }
                });    
            });

            $(document).on('click','.explaination',function(){
                var explaination=$(this).attr('data-explaination');
                $('#explaination').text(explaination);
            });
        });
      </script>
@endsection