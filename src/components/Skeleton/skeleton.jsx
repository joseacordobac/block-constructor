import Skeleton from '@mui/material/Skeleton';
import './skeleton.css'

export default function Variants({	repeats = [1,2,3,4,6,7,8] }) {
  return (
		repeats.map((item) =>(
			<div className="skeleton">
				<div className="skeleton__img">
					<Skeleton variant="rectangular" width={168} height={98} />
				</div>
				<div className="skeleton__content">
					<Skeleton variant="text" sx={{ fontSize: '14px' }} width={44} />
					<Skeleton variant="text" sx={{ fontSize: '16px' }} width={234} />
					<Skeleton variant="text" sx={{ fontSize: '18px' }} width={64}/>
					<Skeleton variant="text" sx={{ fontSize: '12px' }} width={100}/>
					<Skeleton variant="rounded" width={95} height={26} />
				</div>
			</div>
		))
  );
}
