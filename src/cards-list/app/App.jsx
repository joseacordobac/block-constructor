import './app.css';
import API from '../../services/env'
import useFetch from '../../hook/Usefetch'
import adapterBody from '../adapter/adapterbody';
import Skeleton from '../../components/Skeleton/skeleton'
import ValidationImage from '../../components/Valimg/ValImg'

const LIST = API().API_LIST

const insertInTotal = ( total) =>{
	const getTotal = document.querySelector('.card-list-head__total-count');
	if(getTotal) getTotal.innerHTML = total;	
}

const updateTotalPages = ( totalPages ) =>{
	const updateTotalPages = document.querySelector('.wp-block-create-block-cardlist');
	if(updateTotalPages) updateTotalPages.setAttribute('data-pages', totalPages);
}

export default function App({ queryParams }) {

	queryParams.post_type = 'portafolio';
	queryParams.orderby = 'meta_value'

	const options = {
		method: 'POST',
		body: JSON.stringify( adapterBody(queryParams))
	}

	const { data, loading } = useFetch(`${LIST}`, options);
	const responseData = data?.data
	const totalPages = data?.page?.total_pages
	
	if(data?.count) insertInTotal(data?.count)
	if(totalPages) updateTotalPages(totalPages)
	
	
	if(loading) return (
		<Skeleton repeats={[1,2,3,4,5,6,7,8]}/>
	)
	if(responseData?.length === 0) return <div>No hay resultado con los datos consultados</div>
	
	return (
		<>
		{responseData?.map((item) =>
			(
			<div className="card-list-content" key={item.id}>
				<div className="card-list__img">
					{item?.thumbnail && ( 
						<ValidationImage 
							src={item?.thumbnail}
							fallback={'https://catalogo.electrobujias.com/wp-content/uploads/2025/09/logo.png'}
							alt={item?.marca[0]?.name}
						/>
					)}
				</div>
				<div className="card-list__body">
					<span className="card-list__tag-cat">{item?.tipo_producto[0]?.name}</span>
					<div className="card-list__title" dangerouslySetInnerHTML={{__html: item.description}}/>
					<h4 className="card-list__price">{item.price} <span className="card-list__price-description"> {item.nota_price}</span> </h4>
					<p className="card-list__marca">Marca: <strong className="card-list__marca-bold">{item?.marca[0]?.name}</strong></p>
					<a href={`https://wa.me/${item.whatsapp_number}?text=Estoy interesado en: ${item.description}`} target='_blank' className="card-list__contact-us">Pedir</a>
				</div>
			</div>
			))}
		</>
	);
}
