import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	const ALLOWED_BLOCKS = [ 'core/group', 'core/columns', 'core/cover' ];
	return (
		<div className='slide' { ...useBlockProps() }>
			<InnerBlocks allowedBlocks={ ALLOWED_BLOCKS } />
		</div>
	);
}
