

	  @extends('navigation')

	  @section('user_content')

		  <main role="main" class="container">
					  <div class="chat-box pt-5">
						  <div class="row">
							  <div class="col-3  dialog-list">
								  <div class="row">
									  {{--@if((Auth::user()->id)==$data_mes->id_1)--}}
									  <div class="col-12 pt-2" align="center"><img style="width: 90px; border-radius: 50%" src="{{asset('img').'/'.$id_photo}}"/>
									{{$id_name }}</div>
										  {{--@elseif((Auth::user()->id)==$data_mes->id_2)--}}
											  {{--<div class="col-3 delete_padding"><img style="width: 70px; border-radius: 50%" src="{{asset('img').'/'.$data_mes->id_1_photo}}"/></div>--}}
											  {{--<div class="col-9 delete_padding">{{$data_mes->id_1_name }}/div>--}}

										  {{--@endif--}}
								  </div>
							  </div>
							  <div class="col-9 chat-list">
								  <div class="row msgs">
									  <ui id="msg-list" class="slider">
										  @foreach( $data_mes as $mes)
											  @if ($mes->from==(Auth::user()->id))
										  <li id="msg-item" style="text-align: right">{{$mes->message}}</li>
												  @else
												  <li id="msg-item" style="text-align: left">{{$mes->message}}</li>
											  @endif
											  @endforeach
									  </ui>
								  </div>
								  <div class="row controlls">
									  <div class="col-12 delete_padding">
										  <div class="input-group justify-content-between">
											  <input type="text" class="form-control" placeholder="сообщение" name="message" id="message"  aria-label="сообщение" aria-describedby="basic-addon2">
											  <div class="input-group-append">
												  <input type="hidden" id="id_dialog" value="{{$id_d}}">
												  <input type="hidden" id="id_to" value="{{$data_mes[0]->to}}">
												  <button class="btn btn-outline-secondary" id="send_message" type="button">Отправить</button>
											  </div>
										  </div>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>


					  {{--<script>--}}


                          {{--setInterval(function() {--}}
                              {{--$.ajax({--}}
                                  {{--url: '/chatGetMsgItem',--}}
                                  {{--type: "get",--}}
                                  {{--contentType: 'html',--}}
                                  {{--success: function (msg) {--}}
                                      {{--console.log(msg[0].msg);--}}
                                      {{--var item  = document.createElement('li');--}}
                                      {{--item.id = 'msg-item';--}}
                                      {{--item.className = 'me';--}}
                                      {{--item.innerHTML = msg[0].msg;--}}
                                      {{--document.getElementById('msg-list').appendChild(item);--}}
                                  {{--}--}}
                              {{--})--}}
                          {{--}, 3000);--}}


					  {{--</script>--}}

		  </main>


		  @endsection
		  @include ('footer')










	 \