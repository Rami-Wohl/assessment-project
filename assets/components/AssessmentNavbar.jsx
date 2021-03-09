import React from "react";
import ProgressCounter from "./ProgressCounter";

export const AssessmentNavbar = (props) => {
    const count = props.count;
    const total = props.total;
    return (
        <div className={'assessment-nav-footer'}>
            <div>
                {count > 0 && <button onClick={() => props.navigateSlideshow(count - 1)}>Terug</button>}
            </div>
            <div>
                {count <= total && <ProgressCounter count={count}
                                                    total={total}
                                   />
                }
            </div>
            <div>
                {count > total ? <button onClick={() => console.log('hoi')}>Verzend</button> :
                    <button onClick={() => props.navigateSlideshow(count + 1)}>Verder</button>
                }
            </div>
        </div>
    )
}