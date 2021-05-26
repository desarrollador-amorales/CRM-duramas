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
		tracking_lead tl where tl.city_warehouse != ''
	group by
		tl.city_warehouse )as x
/* Query para obtener el numero de proformas,facturas y el total de proformas, facturas por ciudad **/

/**Reporte de usuarios por local**/
select
	x.*,
	x.solicitud + x.seguimiento + x.concretado + x.cancelado as Total
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
		where tl.user_name != ''
	group by
		tl.user_name , tl.city_warehouse
	order by
		tl.city_warehouse )as x
/**Reporte de usuarios por local**/
		
		
		
/**Reporte de campañas por local**/
select x.*,	x.solicitud + x.seguimiento + x.concretado + x.cancelado as Total
from
	(
	select
		tl.city_warehouse , (select c2.description from campaing c2 where c2.name= tl.form_id) as campania, (
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
		campania, tl.city_warehouse
	order by
		tl.city_warehouse )as x
/**Reporte de campañas por local**/


/**Puede Servir Importante **/

/* Query para obtener el numero de proformas y el total de proformas por lead, ciudad y estado **/
select
	tl.name_lead ,
	tl.city_warehouse ,
	hlp.user_name,
	tl.status_name,
	tl.date_create,
	hlp.tracking_lead_id,
	count(*)as num_proforma ,
	sum(hlp.value_proforma) as total_proforma,
	(
	select
		count(*)as num_factura
	from
		history_lead_factura hlf
	where
		tl.tracking_lead_id_gen = hlf.tracking_lead_id
	group by
		hlf.tracking_lead_id) as number_fac,
	(
	select
		sum(hlf.value_factura) as total_factura
	from
		history_lead_factura hlf
	where
		tl.tracking_lead_id_gen = hlf.tracking_lead_id
	group by
		hlf.tracking_lead_id) as total_factura
from
	history_lead_proforma hlp,
	tracking_lead tl
where
	tl.tracking_lead_id_gen = hlp.tracking_lead_id
group by
	hlp.tracking_lead_id


/*** ***/

	select
			count(*)  as num_proforma ,sum(hlp_n.value_proforma) as value_proforma , hlp_n.date_create , hlp_n.tracking_lead_id, tl4.name_lead , tl4.city_warehouse , tl4.user_name , tl4.email_user_name , tl4.status_name 
		from
			history_lead_proforma hlp_n, tracking_lead tl4
		where
			tl4.tracking_lead_id_gen = hlp_n.tracking_lead_id
			and tl4.city_warehouse = 'Ambato'
			and cast(hlp_n.date_create as date) between '2021-05-01' and '2021-05-31'
		group by
			hlp_n.tracking_lead_id 