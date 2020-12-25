@extends('layouts.app') 

@section('content') 
					<p class="heading">Тарифные планы</p>
					
					<div class="text_page">
						<div class="wysiwyg">
							<table style="width: 870px;">
<tbody>
<tr>
<td style="text-align: left;"><strong>Тарифные планы/<br>Характеристики</strong></td>
<td style="width: 217px; text-align: center; font-size: 20px;"><strong>Базовый</strong></td>
<td style="width: 217px; text-align: center; font-size: 20px;"><strong>Оптимальный</strong></td>
<td style="width: 217px; text-align: center; font-size: 20px;"><strong>Расширенный</strong></td>
</tr>
<tr>
<td style="width: 217px;">Плановые выезды</td>
<td style="text-align: center;">2 раза в месяц</td>
<td style="text-align: center;">2 раза в месяц</td>
<td style="text-align: center;">4&nbsp;раза в месяц</td>
</tr>
<tr>
<td>Внеплановые выезды&nbsp;</td>
<td style="text-align: center;">Не предусмотрены. Экстренные выезды за счёт Заказчика</td>
<td style="text-align: center;">Неограниченно</td>
<td style="text-align: center;">Неограниченно&nbsp;</td>
</tr>
<tr>
<td>Учёт объектов обслуживания&nbsp;</td>
<td style="text-align: center;">Ведётся инвентарная база&nbsp;</td>
<td style="text-align: center;">Ведётся инвентарная база&nbsp;</td>
<td style="text-align: center;">Ведётся инвентарная база&nbsp;</td>
</tr>
<tr>
<td>Ремонт&nbsp;</td>
<td style="text-align: center;">Бесплатно. Доставка за счёт Заказчика.&nbsp;</td>
<td style="text-align: center;">Бесплатно. Доставка за счёт Заказчика.&nbsp;</td>
<td style="text-align: center;">Бесплатно. Доставка за счёт Заказчика.&nbsp;</td>
</tr>
<tr>
<td>Мониторинг мощностей&nbsp;</td>
<td style="text-align: center;">Исполнитель ведёт мониторинг, предоставляет Заказчику отчёты и рекомендации по оптимизации IT-инфраструктуры&nbsp;</td>
<td style="text-align: center;">Исполнитель ведёт мониторинг, предоставляет Заказчику отчёты и рекомендации по оптимизации IT-инфраструктуры&nbsp;</td>
<td style="text-align: center;">Исполнитель ведёт мониторинг, предоставляет Заказчику отчёты и рекомендации по оптимизации IT-инфраструктуры&nbsp;</td>
</tr>
<tr>
<td>Уровень оперативности*&nbsp;</td>
<td style="text-align: center;">Стандарт&nbsp;</td>
<td style="text-align: center;">Стандарт&nbsp;</td>
<td style="text-align: center;">Повышенный</td>
</tr>
<tr>
<td>Отчётность&nbsp;</td>
<td style="text-align: center;">По запросу, не чаще 4-ёх раз в год, за прошедший месяц.&nbsp;</td>
<td style="text-align: center;">Предоставляется ежемесячный отчёт по проделанным работам.&nbsp;</td>
<td style="text-align: center;">Предоставляется ежемесячный отчёт по проделанным работам.&nbsp;</td>
</tr>
<tr>
<td>Расследование причин возникновения инциндентов&nbsp;</td>
<td style="text-align: center;">Ведётся. На основании анализа Заявок устраняются проблемы, приводящие к появлению сбоев.&nbsp;</td>
<td style="text-align: center;">Ведётся. На основании анализа Заявок устраняются проблемы, приводящие к появлению сбоев.&nbsp;</td>
<td style="text-align: center;">Ведётся. На основании анализа Заявок устраняются проблемы, приводящие к появлению сбоев.&nbsp;</td>
</tr>
<tr>
<td>Обслуживание "привилегированных" пользователей&nbsp;</td>
<td style="text-align: center;">Нет</td>
<td style="text-align: center;">Возможно определение объектов инфраструктуры с особым уровнем обслуживания.&nbsp;</td>
<td style="text-align: center;">Возможно определение объектов инфраструктуры с особым уровнем обслуживания.&nbsp;</td>
</tr>
<tr>
<td>Планирование расходных материалов&nbsp;</td>
<td style="text-align: center;">Нет&nbsp;</td>
<td style="text-align: center;">Ведётся учёт использования, вырабатываются рекомендации по срокам и объёмам закупок&nbsp;</td>
<td style="text-align: center;">Ведётся учёт использования, вырабатываются рекомендации по срокам и объёмам закупок&nbsp;</td>
</tr>
<tr>
<td>Удалённое администрирование&nbsp;</td>
<td style="text-align: center;">Да. Решение о предоставлении удалённого доступа принимается Заказчиком.&nbsp;</td>
<td style="text-align: center;">Да. Решение о предоставлении удалённого доступа принимается Заказчиком.&nbsp;</td>
<td style="text-align: center;">Да. Решение о предоставлении удалённого доступа принимается Заказчиком.&nbsp;</td>
</tr>
<tr>
<td>Замена расходных материалов&nbsp;</td>
<td style="text-align: center;">Нет&nbsp;</td>
<td style="text-align: center;">Нет&nbsp;</td>
<td style="text-align: center;">Исполнитель самостоятельно производит замену расходных материалов.&nbsp;</td>
</tr>
<tr>
<td>Обслуживание копировально-множительной техники&nbsp;</td>
<td style="text-align: center;">По дополнительному договору подряда. Доставка в ремонт за счёт Заказчика.&nbsp;</td>
<td style="text-align: center;">По дополнительному договору подряда. Доставка в ремонт силами Исполнителя.&nbsp;</td>
<td style="text-align: center;">По дополнительному договору подряда. Доставка в ремонт силами Исполнителя.&nbsp;</td>
</tr>
<tr>
<td>SERVICE DESK&nbsp;</td>
<td style="text-align: center;">Нет</td>
<td style="text-align: center;">Предоставляется доступ к Web-порталу для открытия Заявок и отслеживание хода их исполнения.&nbsp;</td>
<td style="text-align: center;">Предоставляется доступ к Web-порталу для открытия Заявок и отслеживание хода их исполнения.&nbsp;</td>
</tr>
<tr>
<td>Стоимость&nbsp;</td>
<td style="text-align: center;">Рабочее место - 300 руб. Сервер - 1000 руб.&nbsp;</td>
<td style="text-align: center;">Рабочее место - 500 руб. Расчет стоимости договора в соответствии с "Калькулятором"&nbsp;</td>
<td style="text-align: center;">Рабочее место - 600 руб. Расчет стоимости договора в соответствии с "Калькулятором"&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td style="text-align: center;"><span class="btn_blue"><a href="/subscription-service/calc">Расчет Стоимости</a></span></td>
<td style="text-align: center;"><span class="btn_blue"><a href="/subscription-service/calc/1">Расчет Стоимости</a></span></td>
<td style="text-align: center;"><span class="btn_blue"><a href="/subscription-service/calc/2">Расчет Стоимости</a></span></td>
</tr>
</tbody>
</table>
<h2><br>* Уровни оперативности</h2>
<table style="width: 870px;">
<tbody>
<tr>
<td style="text-align: left;"><strong>Уровни SLA</strong></td>
<td style="width: 217px; text-align: center;"><strong>Описание</strong></td>
<td style="width: 217px; text-align: center;"><strong>Стандартные референции</strong></td>
<td style="width: 217px; text-align: center;"><strong>Время реакции/решение проблемы</strong></td>
</tr>
<tr>
<td style="width: 217px;">1</td>
<td style="text-align: center;">Поддержка ключевых систем в непрерывном рабочем состоянии</td>
<td style="text-align: center;">Остановка/потеря связи с сервером; остановка критически важного серверного приложения; потеря связи с элементами локальной сети; любой инцидент, остановивший деятельность компании в целом и связанный с работой ИТ</td>
<td style="text-align: center;">СТАНДАРТ - 4 часа/24 часа<br>ПОВЫШЕННЫЙ - 2 часа/12 часов<br>ОСОБЫЙ - 1 час/4 часа</td>
</tr>
<tr>
<td>2</td>
<td style="text-align: center;">Поддержка рабочих станций компании в непрерывном рабочем состоянии</td>
<td style="text-align: center;">Проблемы приложений на одной из рабочих станций; потеря связи с локальной сетью одного из компьютеров; любой инцидент, остановивший деятельность одного из сотрудников и связанный с работой ИТ</td>
<td style="text-align: center;">СТАНДАРТ - 4 часа/24 часа<br>ПОВЫШЕННЫЙ - 2 часа/8 часов<br>ОСОБЫЙ - 1 час/4 часа&nbsp;</td>
</tr>
<tr>
<td>3&nbsp;</td>
<td style="text-align: center;">Поддержка ИТ-инфраструктуры</td>
<td style="text-align: center;">Добавление и удаление новых пользователей; настройка офисных приложений;&nbsp;</td>
<td style="text-align: center;">СТАНДАРТ - 4 часа/24 часа<br>ПОВЫШЕННЫЙ - 2 часа/8 часов&nbsp;</td>
</tr>
<tr>
<td>4</td>
<td style="text-align: center;">Поддержка документации ИТ-инфраструктуры в актуальном состоянии&nbsp;</td>
<td style="text-align: center;">Проведение аудита инфраструктуры; составление документации и внесение изменений в документацию&nbsp;</td>
<td style="text-align: center;">СТАНДАРТ - 1 неделя/1 неделя<br>ПОВЫШЕННЫЙ - 2 раб.дня/2 раб.дня</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>						</div>
					</div>
 
@endsection