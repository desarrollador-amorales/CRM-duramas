/* Query para obtener el numero de proformas,facturas y el total de proformas, facturas por ciudad **/
select
	x.city_warehouse,
	(case
		when x.number_proforma is null then 0
		else x.number_proforma end ) number_proforma,
	(case
		when x.total_proforma is null then 0
		else x.total_proforma end) total_proforma,
	(case
		when x.number_fac is null then 0
		else x.number_fac end) number_fac,
	(case
		when x.total_factura is null then 0
		else x.total_factura end) total_factura
from
	(
	select
		tl.city_warehouse , (
		select
			(case when count(*) is null then 0 else count(*) end) as num_proforma
		from
			history_lead_proforma hlp_n, tracking_lead tl4
		where
			tl4.tracking_lead_id_gen = hlp_n.tracking_lead_id
			and tl4.city_warehouse = tl.city_warehouse
			and cast(hlp_n.date_create as date) between '2021-05-01' and '2021-05-31'
		group by
			tl4.city_warehouse) as number_proforma, (
		select
			sum(hlp_v.value_proforma) as total_proforma
		from
			history_lead_proforma hlp_v, tracking_lead tl5
		where
			tl5.tracking_lead_id_gen = hlp_v.tracking_lead_id
			and tl5.city_warehouse = tl.city_warehouse
			and cast(hlp_v.date_create as date) between '2021-05-01' and '2021-05-31'
		group by
			tl5.city_warehouse ) as total_proforma, (
		select
			count(*)as num_factura
		from
			history_lead_factura hlf_n, tracking_lead tl2
		where
			tl2.tracking_lead_id_gen = hlf_n.tracking_lead_id
			and tl2.city_warehouse = tl.city_warehouse
			and cast(hlf_n.date_create as date) between '2021-05-01' and '2021-05-31'
		group by
			tl2.city_warehouse) as number_fac, (
		select
			sum(hlf_v.value_factura) as total_factura
		from
			history_lead_factura hlf_v, tracking_lead tl3
		where
			tl3.tracking_lead_id_gen = hlf_v.tracking_lead_id
			and tl3.city_warehouse = tl.city_warehouse
			and cast(hlf_v.date_create as date) between '2021-05-01' and '2021-05-31'
		group by
			tl3.city_warehouse ) as total_factura
	from
		tracking_lead tl
	group by
		tl.city_warehouse )as x
/* Query para obtener el numero de proformas,facturas y el total de proformas, facturas por ciudad **/

/**Reporte de usuarios por local**/
select
	x.*,
	x.solicitud + x.seguimiento + x.concretado + x.cancelado as total
from
	(
	select
		tl.city_warehouse , tl.user_name, (
		select
			count(*)
		from
			tracking_lead tl2
		where
			tl.user_name = tl2.user_name
			and tl.city_warehouse = tl2.city_warehouse
			and tl2.date_create between '2021-05-01' and '2021-05-31'
			and tl2.status_name = 'Solicitud' ) as Solicitud , (
		select
			count(*)
		from
			tracking_lead tl2
		where
			tl.user_name = tl2.user_name
			and tl.city_warehouse = tl2.city_warehouse
			and tl2.date_create between '2021-05-01' and '2021-05-31'
			and tl2.status_name = 'Seguimiento' ) as Seguimiento, (
		select
			count(*)
		from
			tracking_lead tl2
		where
			tl.user_name = tl2.user_name
			and tl.city_warehouse = tl2.city_warehouse
			and tl2.date_create between '2021-05-01' and '2021-05-31'
			and tl2.status_name = 'Concretado' ) as Concretado, (
		select
			count(*)
		from
			tracking_lead tl2
		where
			tl.user_name = tl2.user_name
			and tl.city_warehouse = tl2.city_warehouse
			and tl2.date_create between '2021-05-01' and '2021-05-31'
			and tl2.status_name = 'Cancelado' ) as Cancelado
	from
		tracking_lead tl
	group by
		tl.user_name , tl.city_warehouse
	order by
		tl.city_warehouse )as x
/**Reporte de usuarios por local**/
		
		
		
/**Reporte de campañas por local**/
select
	x.*,
	x.solicitud + x.seguimiento + x.concretado + x.cancelado as total
from
	(
	select
		tl.city_warehouse , (select c2.description from campaing c2 where c2.name= tl.form_id) as campaña, (
		select
			count(*)
		from
			tracking_lead tl2
		where
			tl.form_id = tl2.form_id 
			and tl.city_warehouse = tl2.city_warehouse
			and tl2.date_create between '2021-05-01' and '2021-05-31'
			and tl2.status_name = 'Solicitud' ) as Solicitud , (
		select
			count(*)
		from
			tracking_lead tl2
		where
			tl.form_id = tl2.form_id 
			and tl.city_warehouse = tl2.city_warehouse
			and tl2.date_create between '2021-05-01' and '2021-05-31'
			and tl2.status_name = 'Seguimiento' ) as Seguimiento, (
		select
			count(*)
		from
			tracking_lead tl2
		where
			tl.form_id = tl2.form_id 
			and tl.city_warehouse = tl2.city_warehouse
			and tl2.date_create between '2021-05-01' and '2021-05-31'
			and tl2.status_name = 'Concretado' ) as Concretado, (
		select
			count(*)
		from
			tracking_lead tl2
		where
			tl.form_id = tl2.form_id 
			and tl.city_warehouse = tl2.city_warehouse
			and tl2.date_create between '2021-05-01' and '2021-05-31'
			and tl2.status_name = 'Cancelado' ) as Cancelado
	from
		tracking_lead tl
	where tl.date_create between '2021-05-01' and '2021-05-31'
	group by
		campaña, tl.city_warehouse
	order by
		tl.city_warehouse )as x
/**Reporte de campañas por local**/
	
