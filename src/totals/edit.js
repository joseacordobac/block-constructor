import './editor.scss';

export default function Edit({attributes, setAttributes}) {

    return (
				<div className="card-list-head">
					<h3 className="card-list-head__total">XX productos en tu busqueda</h3>
					<div className="card-list-head__sort">
						<h4 className="card-list-head__sort-title">Ordenar por:
							<span className='card-list-head__sort-order'>{'Precio de menor a mayor'}</span>
						</h4>
					</div>
				</div>
    );
}
