import React from "react";
import ProgressCounter from "./ProgressCounter";
import {withRouter} from "react-router-dom";

const AssessmentNavbar = (props) => {
    const count = props.count;
    const total = props.total;
    const isComplete = props.checkCompletion();
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
                {count >= total ? <button className={'nav-button'}
                                          disabled={!isComplete}
                                          onClick={() => props.submitResults()}>Verzend</button> :
                    <button className={'nav-button'}
                            onClick={() => props.navigateSlideshow(count + 1)}>Verder</button>
                }
            </div>
        </div>
    )
}

export default withRouter(AssessmentNavbar);