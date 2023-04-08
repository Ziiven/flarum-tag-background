import {extend, override} from 'flarum/extend';
import SettingsPage from './components/SettingsPage';

app.initializers.add('ziven-tag-background', () => {
  app.extensionData
    .for('ziiven-tag-background').registerPage(SettingsPage);
});
