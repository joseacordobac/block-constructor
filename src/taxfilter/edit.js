import { __ } from '@wordpress/i18n';
import {useBlockProps, InspectorControls} from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import getAllTax  from '../utilities/getAllTax'
import useFetch from '../hook/Usefetch';
import './editor.scss';

const allTax = await getAllTax();

export default function Edit({ attributes, setAttributes }) {

    const { type, style, taxonomySlug, className, name } = attributes;
    const { data } = useFetch(`/wp-json/wp/v2/${taxonomySlug}?per_page=100&hide_empty=false`);

    return (
        <>
            <InspectorControls>
				<PanelBody title={__('Configuraciones', 'text-domain')} initialOpen={true}>
					<TextControl
						label={__('Nombre', 'text-domain')}
						value={name}
						onChange={(newName) => setAttributes({ name: newName })}
					/>
					<SelectControl
						label={__('Tip de filtro', 'text-domain')}
						value={type}
						options={[
								{ label: __('Chips', 'text-domain'), value: 'radio' },
								{ label: __('Checkbox', 'text-domain'), value: 'checkbox' },
						]}
						onChange={(newType) => setAttributes({ type: newType })}
					/>
					<SelectControl
						label={__('Dirección de filtro', 'text-domain')}
						value={style}
						options={[
								{ label: __('En linea', 'text-domain'), value: 'inline' },
								{ label: __('Columna', 'text-domain'), value: 'column' },
						]}
						onChange={(newStyle) => setAttributes({ style: newStyle })}
					/>
					<SelectControl
						label={__('Taxonomia', 'text-domain')}
						value={taxonomySlug}
						options={[...allTax]}
						onChange={(newTax) => setAttributes({ taxonomySlug: newTax })}
					/>
				</PanelBody>
            </InspectorControls>

            <div
				{...useBlockProps({
						className: `${className || ''} block-taxfilter block-taxfilter--${style} block-taxfilter--${type}`,
				})}
            >
				{name && <h2 className="block-taxfilter__title">{name}</h2>}
				{data?.map((item) => (
					<div className="block-taxfilter__item" key={item.id}>
						<label className="block-taxfilter__label">
							<input
								className="block-taxfilter__input"
								type={type}
								name={taxonomySlug}
								id={item.slug}
							/>
							<span>{item.name}</span>
						</label>
					</div>
				))}
            </div>
        </>
    );
}
