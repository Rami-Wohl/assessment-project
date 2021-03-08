import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch, Redirect, BrowserRouter as Router } from 'react-router-dom';
import './styles/app.scss';
import {BasePageLayout} from './components/BasePageLayout'
import Assessment from './components/Assessment'
import {IntroPage} from "./components/IntroPage";

class App extends Component {
    constructor(props) {
        super(props);

        this.state = {
            'assessmentTitle': window.assessmentTitle,
            'assessmentCode': window.assessmentCode,
        };
    }

    render() {

        return (
                <BasePageLayout title={window.assessmentTitle}>
                    <Switch>
                        <Redirect exact from="/" to="/intro" />
                        <Route path="/intro" render={({}) => {
                            return <IntroPage assessmentData={this.state}/>;
                        }}/>
                        <Route path="/assessment" render={({}) => {
                            return <Assessment assessmentData={this.state}/>;
                        }}/>
                     </Switch>
                </BasePageLayout>
        );
    }

}

ReactDOM.render(
    <Router>
        <App/>
    </Router>,
    document.getElementById('root')
);


