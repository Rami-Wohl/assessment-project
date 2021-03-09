import React from "react";
import ProgressCounter from "./ProgressCounter";
import LinkButton from "./LinkButton";

export const AssessmentNavbar = (props) => {
    const count = props.count;
    const total = props.total;
    return (
        <div className={'assessment-nav-footer'}>
            <div className={'nav-back'}>
                {count > 0 && <button onClick={() => props.navigateSlideshow(count - 1)}>Terug</button>}
            </div>
            <div className={'progress-counter'}>
                {count < total && <ProgressCounter count={count}
                                                   total={total}
                                   />
                }
            </div>
            <div className={'nav-forward'}>
                {count >= total ? <LinkButton to={'/results'}>Verzend</LinkButton> :
                    <button onClick={() => props.navigateSlideshow(count + 1)}>Verder</button>
                }
            </div>
        </div>
    )
}