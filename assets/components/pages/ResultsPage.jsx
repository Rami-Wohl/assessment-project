import React from "react";

export const ResultsPage = (props) => {

    return (
        <div className={'results-body'}>
            {props.results.map((result, i) =>
                <div className={'score-box'} key={i}>
                    <div className={'score-title'}>{result.resultTitle}</div>
                    <div className={'score-result'}>{result.resultValue}</div>
                </div>
            )}
        </div>
    )
}