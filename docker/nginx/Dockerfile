FROM nginx:stable-alpine

#RUN mkdir /etc/nginx/sites-available \
#	&& mkdir /etc/nginx/sites-enabled \
#	&& rm -f /docker-entrypoint.d/10-listen-on-ipv6-by-default.sh \
#	# Remove default nginx config
#	&& rm -f /etc/nginx/nginx.conf \
# RUN  rm -f /etc/nginx/conf.d/default.conf

# Add nginx global config
#ADD ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
#ADD ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
ADD ./docker/nginx/sites/api.jam.market.conf.template /etc/nginx/conf.d/api.jam.market.conf
ADD ./docker/nginx/sites/admin.jam.market.conf.template /etc/nginx/conf.d/admin.jam.market.conf
