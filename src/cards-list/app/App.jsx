import './app.css';
import API from '../../services/env'
import useFetch from '../../hook/Usefetch'
import adapterBody from '../adapter/adapterbody';
import Skeleton from '../../components/Skeleton/skeleton'

const LIST = API().API_LIST

const numberDots = (numbersString) =>{
	let numbers = Number(numbersString);
	let numbersFormateado = numbers.toLocaleString('es-ES');
	return numbersFormateado
}

export default function App({ queryParams }) {

	const options = {
    method: 'POST',
    body: JSON.stringify( adapterBody(queryParams))
  }

	const { data, loading } = useFetch(`${LIST}`, options);
	const responseData = data?.data

	if(loading) return (
		<Skeleton repeats={[1,2,3,4,5,6,7,8]}/>
	)
	if(responseData?.length === 0) return <div>No hay resultado con los datos consultados</div>

	return (
		 	<>
				{responseData?.map((item) =>
				 (
					<div className="card-list-content" key={item.id}>
						<div className="card-lis__img">
							{item?.thumbnail && ( <img src={item.thumbnail} className='card-list__img-src' />)}
						</div>
						<div className="card-list__body">
							<span className="card-list__tag-cat">{item?.tipo_producto[0]?.name}</span>
							<div className="card-list__title" dangerouslySetInnerHTML={{__html: item.description}}/>
							<h4 className="card-list__price">{numberDots(item.price)} <span className="card-list__price-description"> {item.nota_price}</span> </h4>
							<p className="card-list__marca">Marca: <strong className="card-list__marca-bold">{item?.marca[0]?.name}</strong></p>
							<a href="https://wa.me/573016947189" target='_blank' className="card-list__contact-us">Pedir</a>
						</div>
					</div>
				))}
			</>
	);
}
