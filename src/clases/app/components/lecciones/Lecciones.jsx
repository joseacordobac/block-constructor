import { Link } from "react-router-dom"
import './lecciones.css'

export default function Lecciones({list, closeMenu, totalSlashes}) {

	const envia = () => {
		closeMenu(false)
	}

		return (
				<div className={`lecciones ${totalSlashes === 1 ? 'clase' : ''}`}>
					<div className="lecciones-head">
						<h2 className="lecciones__title">Lecciones</h2>
						{totalSlashes !== 1 &&
							<span className="lecciones__line" onClick={envia}>Cerrar</span>
						}
					</div>
					<div className="lecciones-info">
						{list?.map((item) => (
							<div className=
								{`lecciones__list ${item.completed ? 'lecciones__list--completed' : ''}`}
								key={item.id}
								onClick={envia}
							>
								<Link to={`./${item.slug}`} className="lecciones__link">
									<div className="lecciones__list-img">
										<img
											className="lecciones__img"
											src={
											(item?.featured_image) ?
											item?.featured_image :
											'https://www.shutterstock.com/image-vector/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg'
										}
											alt={item?.title} />
									</div>
									<h3 className="lecciones__name">{item.title}</h3>
								</Link>
							</div>
						))}
					</div>
				</div>
		)
}
