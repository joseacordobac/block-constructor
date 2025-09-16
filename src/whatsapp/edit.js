import './editor.scss';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl } from '@wordpress/components';


export default function Edit({attributes, setAttributes}) {

	const {whatsappText, whatsappNumber, whatsappMessage, position} = attributes;
	const blockProps = useBlockProps({ className: 'ctom-block-whatsapp' });


    return (
		<>
			<InspectorControls>
				<PanelBody title="Whatsapp Configs">
					<TextControl
						label="Whatsapp Message"
						value= {whatsappMessage}
						onChange={(message) => setAttributes({whatsappMessage: message})}
					/>
					<TextControl
						label="Número de whatsapp"
						value= {whatsappNumber}
						onChange={(text) => setAttributes({whatsappNumber: text})}
					/>
					<SelectControl
						label={ 'Position' }
						value={ position.type }
						onChange={ (e) => setAttributes({ position: { type: e } })}
						options={ [
							{ value: 'fijo', label: 'Relativo' },
							{ value: 'fixed', label: 'flotante' },
						] }
					/>
				</PanelBody>
			</InspectorControls>
			<div
                {...blockProps}
                style={{ position: position.type }}
            >
				<div class="ctom-block-whatsapp__anchor">
					<RichText
						tagName="p"
						value={whatsappText}
						onChange={(text) => setAttributes({whatsappText: text})}
					/>
				</div>
			</div>
		</>
    );
}
