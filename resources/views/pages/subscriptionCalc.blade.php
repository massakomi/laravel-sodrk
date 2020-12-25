@extends('layouts.app') 

@section('content')  

					<p class="heading">Калькулятор</p>

					<!-- service request -->
					<div class="srv_r form_fields calc-block">
												<form action="/subscription-service/calc" method="post">
							<div class="calc form_fields">
								<div class="row_sec">
									<div class="txt">Тарифный план:</div>
									<div class="fields tariff">
																				<div class="radio">
											<input type="radio" name="tariff" id="r0" value="0" checked="checked">
											<label for="r0">Тариф «Эконом»</label>
										</div>
																				<div class="radio">
											<input type="radio" name="tariff" id="r1" value="1">
											<label for="r1">Тариф «Оптимальный»</label>
										</div>
																				<div class="radio">
											<input type="radio" name="tariff" id="r2" value="2">
											<label for="r2">Тариф «Расширенный»</label>
										</div>
																				<div class="clear"></div>
									</div>
								</div>

								<div class="row_sec comp_count">
									<div class="txt">Количество комьютеров:</div>
									<div class="fields quantity">
										<input type="text" class="txt_field" name="q" value="1">
										<p class="price">0.00<i></i></p>
										<p class="price pull-right" data-v="0">0.00<i></i></p>
										<div class="clear"></div>
									</div>
								</div>

								<div class="row_sec">
									<div class="txt">Услуги:</div>
									<div class="fields check">
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="a" id="a" value="0.00">
												<label for="a">Основные серверные службы (файл и принт-сервер, AD, DHCP, DNS)</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="b" id="b" value="0.00">
												<label for="b">Сервер доступа в интернет (прокси сервер)</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="c" id="c" value="0.00">
												<label for="c">Сервер электронной почты</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="d" id="d" value="0.00">
												<label for="d">Удаленный доступ (серверы терминалов)</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="e" id="e" value="0.00">
												<label for="e">Серверы баз данных (MS SQL, Oracle)</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="f" id="f" value="0.00">
												<label for="f">Сервер 1С</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="g" id="g" value="0.00">
												<label for="g">Печатная техника</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="h" id="h" value="0.00">
												<label for="h">Администрирование АТС</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="i" id="i" value="0.00">
												<label for="i">Сопровождение СКС</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_checkbox">
											<div class="checkbox">
												<input type="checkbox" name="j" id="j" value="0.00">
												<label for="j">Антивирусная защита</label>
											</div>
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
																				<div class="row_sec calc">
											<div class="txt">Время обслуживания</div>
											<div class="select">
												<select name="time">
																										<option value="0">8х5</option>
																										<option value="1">24х7</option>
																									</select>
											</div>
										</div>
										<div class="row_total">
											Итого:
											<p class="price pull-right">0.00<i></i></p>
											<div class="clear"></div>
										</div>
									</div>
								</div>

								<div class="row_sec">
									<div class="txt"></div>
									<div class="fields total">
										<p style="padding-top: 2px;">Ориентировочная стоимость абонентского обслуживания в месяц составит:<br>Окончательная стоимость определяется после аудита ИТ-инфраструктуры.</p>
										<a href="#" class="btn pull-right">Расчитать стоимость</a>
																				<p class="price pull-right">0.00<i></i></p>
									</div>
								</div>
                                								<div class="row_sec buttons" style="display: none;">
									<div class="txt"></div>
									<div class="fields right">
										<a href="#" class="btn print">Распечатать расчет</a>
										<a href="#" class="btn send">Отправить заявку с расчетом</a>
									</div>
								</div>
								<div id="send-form" style="display: none;">
									<div class="row_sec">
										<div class="txt">ФИО / Название компании:<span>*</span></div>
										<div class="fields">
											<input type="text" class="txt_field" name="name" value="">
																					</div>
									</div>
									<div class="row_sec">
										<div class="txt">Телефон:</div>
										<div class="fields">
											<input type="text" class="txt_field" name="phone" value="">
										</div>
									</div>
									<div class="row_sec">
										<div class="txt">Электронная почта:<span>*</span></div>
										<div class="fields">
											<input type="text" class="txt_field" name="email" value="">
																					</div>
									</div>
									<div class="row_sec captcha">
										<div class="fields">
											<div class="personal_info">
												<input type="checkbox" name="personal" id="personal">
												<label for="personal">Я даю согласие на обработку персональных данных</label>
																							</div>
										</div>
									</div>
									<div class="row_sec captcha">
										<div class="txt"></div>
										<div class="fields">
											<input type="submit" value="Отправить" class="btn_done">
										</div>
									</div>
								</div>

							</div>
						</form>

					</div>
					<!-- service request end -->
 

@endsection