
import { __ } from '@wordpress/i18n';
import './editor.scss';
import {useBlockProps, InspectorControls} from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import getAllCPT from '../utilities/getAllCpt'

const postTypeOptions = await getAllCPT();
console.log(postTypeOptions)

export default function Edit({attributes, setAttributes}) {

	const {postType} = attributes

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Configuraciones', 'text-domain')} initialOpen={true}>
						<SelectControl
							label={__('Seleccionar tipo de contenido', 'text-domain')}
							value={postType}
							options={[...postTypeOptions]}
							onChange={(newPostype) => setAttributes({ postType: newPostype })}
						/>
					</PanelBody>
				</InspectorControls>

				<h1>Componente lista de clases de cards</h1>
		</>
	);
}
