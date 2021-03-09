import React from "react";
import ProgressCounter from "./ProgressCounter";
import LinkButton from "./LinkButton";

export const AssessmentNavbar = (props) => {
    const count = props.count;
    const total = props.total;
    return (
        <div className={'assessment-nav-footer'}>
            <div className={'nav-back'}>
                {count > 0 && <button className={'nav-button'}
                                      onClick={() => props.navigateSlideshow(count - 1)}>Terug</button>}
            </div>
            {count < total && <ProgressCounter count={count}
                                               total={total}
                                               hasAnswer={props.hasAnswer}
                              />
            }
            <div className={'nav-forward'}>
                {count >= total ? <LinkButton to={'/results'}>Verzend</LinkButton> :
                    <button className={'nav-button'}
                            onClick={() => props.navigateSlideshow(count + 1)}>Verder</button>
                }
            </div>
        </div>
    )
}