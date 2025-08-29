import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks, InspectorControls, MediaPlaceholder } from '@wordpress/block-editor';
import './editor.scss';
import { PanelBody, RangeControl, ToggleControl, SelectControl, TextControl } from '@wordpress/components';
import { useEffect, useRef } from '@wordpress/element';
import {adapterAttributeSliderUpdate, adapterAttributeSliderInput} from './adapters/adapter-attribute'


export default function Edit({ className, attributes, setAttributes, clientId }) {

	const slidePerViewRef = useRef()
	const { slideConfig, sliderId, arrowIcon } = attributes
	const  ALLOWED_BLOCKS = [ 'create-block/slide-block' ];

	setAttributes({sliderId: clientId})
	const attributeAdapter = adapterAttributeSliderInput(slideConfig, sliderId)
	
	const updateConfigSlide = (key, value) => {
		const newConfigSlide = {
			...slideConfig,
			[key]: value
		}
		const dataSlideUpdate = adapterAttributeSliderUpdate(newConfigSlide, sliderId)
		setAttributes({ slideConfig: dataSlideUpdate })
	}

	const blockProps = useBlockProps( {
		className: 'slider-block',
		id: 'block-' + clientId,
		ref: slidePerViewRef,
	} );

	const handleArrowsIcon = (key, value) => {
		const newArrowIcon = {
			...arrowIcon,
			[key]: value
		}
		setAttributes({arrowIcon:newArrowIcon})
	}

	useEffect(() => {
			const gridElement =  slidePerViewRef.current?.querySelector('#block-' + clientId + ' .block-editor-block-list__layout')
			if(!gridElement) return

			gridElement.style.display = `grid`
			gridElement.style.gridTemplateColumns = `repeat(${attributeAdapter?.slidesPerView}, 1fr)`

	}, [attributeAdapter?.slidesPerView])

	return (
		<>
		<InspectorControls>
			<PanelBody title={__('Slider Settings', 'sliders-block')} initialOpen={true}>
				<RangeControl
					allowReset
					resetFallbackValue={1}
					label={__('slides per view desktop', 'sliders-block')}
					value={ attributeAdapter?.slidesPerView}
					min={1}
					max={12}
					onChange={(value) => updateConfigSlide('slidesPerView', value)}
				/>
				<ToggleControl
					label="Slider infinito"
					checked={ attributeAdapter?.loop}
					onChange={ (e) => updateConfigSlide('loop', !attributeAdapter?.loop ) }
				/>
				<ToggleControl
					label="Dots paginacion"
					checked={ attributeAdapter?.pagination}
					onChange={ (e) => updateConfigSlide('pagination', !attributeAdapter?.pagination ) }
				/>
				<ToggleControl
					label="Flechas de navegación"
					checked={ attributeAdapter?.arrows}
					onChange={ (e) => updateConfigSlide('arrows', !attributeAdapter?.arrows ) }
				/>
				<ToggleControl
					label="Autoplay"
					checked={ attributeAdapter?.autoplay}
					onChange={ (e) => updateConfigSlide('autoplay', !attributeAdapter?.autoplay ) }
				/>
				<RangeControl
					allowReset
					resetFallbackValue={1}
					label={__('Espacio entre slider', 'sliders-block')}
					value={ attributeAdapter?.slidesPerView}
					min={1}
					max={100}
					onChange={(value) => updateConfigSlide('spaceBetween', value)}
				/>
				<ToggleControl
					label="Slider navegación por thumbs"
					checked={ attributeAdapter?.Hasthumbs}
					onChange={ (e) => updateConfigSlide('Hasthumbs', !attributeAdapter?.Hasthumbs ) }
				/>

				<TextControl
					label={__('Id de slider', 'sliders-block')}
					value={ sliderId }
					onChange={ (e) => setAttributes({ sliderId: e }) }
				/>


				<SelectControl
					label={ __( 'Animación' ) }
					value={ attributeAdapter?.animation }
					onChange={ (e) => updateConfigSlide('animation', e) }
					options={ [
						{ value: null, label: 'Seleccionar transición', disabled: true },
						{ value: 'fade', label: 'Fade' },
						{ value: 'slide', label: 'Slide' },
						{ value: 'zoom', label: 'Zoom' },
						{ value: 'flip', label: 'Flip' },
						{ value: 'cube', label: 'Cube' },
						{ value: 'coverflow', label: 'Coverflow' },
						{ value: 'creative', label: 'Creative' },
						{ value: 'card', label: 'Card' },
					] }
				/>
			</PanelBody>

			<PanelBody title={__('Mobile settings', 'sliders-block')} initialOpen={true}>
				<RangeControl
					allowReset
					resetFallbackValue={1}
					label={__('slides per view mobile', 'sliders-block')}
					value={ attributeAdapter?.slidesPerViewMobile}
					min={1}
					max={12}
					onChange={(value) => updateConfigSlide('slidesPerViewMobile', value)}
				/>
			</PanelBody>

			<PanelBody title={__('Iconos flechas', 'sliders-block')} initialOpen={true}>
				<div className='slider-block__arrows'>

					<div className='slider-block__arrow'>
						{
							arrowIcon?.next &&
							<img src={arrowIcon.prev} alt="arrow" />
						}
						<MediaPlaceholder
							onSelect={ (media) => {
								handleArrowsIcon('prev', media.url)
							}}
							icon="format-image"
							accept="image/*"
							allowedTypes={ ['image'] }
							multiple={ false }
						/>
						<span>Icono anterior</span>
					</div>
					<div className='slider-block__arrow'>
						{
							arrowIcon?.next &&
							<img src={arrowIcon.next} alt="arrow" />
						}
						<MediaPlaceholder
							onSelect={ (media) => {
								handleArrowsIcon('next', media.url)
							}}
							icon="format-image"
							accept="image/*"
							allowedTypes={ ['image'] }
							multiple={ false }
						/>
						<span>Icono siguiente</span>

					</div>

				</div>
			</PanelBody>

		</InspectorControls>

		<div { ...blockProps } ref={ slidePerViewRef }>
			<InnerBlocks allowedBlocks={ ALLOWED_BLOCKS } />
		</div>

		</>
	);
}
