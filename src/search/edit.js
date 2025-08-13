import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit( { attributes } ) {

	const { placeholder, buttonText, searchPage, className, icon } = attributes;


	return (
		<div {...useBlockProps()} className={className + ' block-my-search'}>
			<span className="block-my-search__icon">{icon}</span>
			<input className="block-my-search__input" type="text" placeholder={placeholder} />
			<button className="block-my-search__button">{buttonText}</button>
		</div>
	);
}
